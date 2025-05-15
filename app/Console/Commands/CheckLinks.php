<?php

namespace App\Console\Commands;

use Exception;
use App\Helpers\Helpers;
use App\Models\Operator;
use App\Models\CheckHistory;
use App\Models\Accommodation;
use Illuminate\Console\Command;

class CheckLinks extends Command
{
    protected $signature = 'check:links';

    protected $description = 'Check links';

    public function handle()
    {
        // initialize counter
        $checked = 0;

        // fetch values from config
        $max = config('linkscanner.max_links_per_run');
        $minScanMinutes = config('linkscanner.scan_frequency_minutes');
        $invalidateAfterDays = config('linkscanner.invalid_after_days');

        // calculate cutoff time for eligible links
        $cutoffTime = now()->subMinutes($minScanMinutes);

        // fetch eligible accommodation and operator links
        $links = Accommodation::whereNull('last_checked')
            ->orWhere('last_checked', '<=', $cutoffTime)
            ->take($max)
            ->get()
            ->concat(
                Operator::whereNull('last_checked')
                    ->orWhere('last_checked', '<=', $cutoffTime)
                    ->take($max)
                    ->get()
            )
            ->take($max)
            ->values();

        // iterate over each link
        foreach ($links as $link) {
            // skip invalid or missing urls
            if (empty($link->website) || !filter_var($link->website, FILTER_VALIDATE_URL)) {
                $this->warn("invalid or missing link for: {$link->name} ({$link->type})");
                continue;
            }

            try {
                // perform link check
                $response = Helpers::checkLink($link->website);

                // update link with latest status
                $link->update([
                    'last_status' => $response->status,
                    'last_checked' => now(),
                    'is_invalid' => $this->shouldInvalidate($response->status, $link->last_checked, $invalidateAfterDays),
                ]);

                // log check history
                CheckHistory::create([
                    'website' => $link->website,
                    'status' => $response->status,
                    'redirect_url' => $response->redirect_url,
                ]);

                // display success message
                $statusLine = "checked {$link->type}: {$link->website} (status: {$response->status})";
                if ($response->redirect_url) {
                    $statusLine .= " → {$response->redirect_url}";
                }
                $this->info($statusLine);

                // increment counter
                $checked++;
            } catch (Exception $e) {
                // display error
                $this->error("failed to check {$link->website}: " . $e->getMessage());
            }

            // stop if max count reached
            if ($checked >= $max) {
                break;
            }
        }

        // summary
        $this->info("Links checked: {$checked}");
    }

    protected function shouldInvalidate($status, $lastChecked, $invalidAfterDays)
    {
        // list of statuses considered faulty
        $faultyStatuses = [0, 404, 500];

        // check if link should be marked as invalid
        return in_array($status, $faultyStatuses) &&
            $lastChecked &&
            now()->diffInDays($lastChecked) >= $invalidAfterDays;
    }
}

<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Helpers
{
    public static function mergeCollections($accommodations, $operators)
    {
        $merged = [];

        foreach ($accommodations as $accommodation) {
            $merged[] = [
                'id' => $accommodation->id,
                'type' => 'Accommodation',
                'name' => $accommodation->name,
                'website' => $accommodation->website,
                'last_status' => $accommodation->last_status,
                'last_checked' => $accommodation->last_checked,
            ];
        }

        foreach ($operators as $operator) {
            $merged[] = [
                'id' => $operator->id,
                'type' => 'Tour Operator',
                'name' => $operator->name,
                'website' => $operator->website,
                'last_status' => $operator->last_status,
                'last_checked' => $operator->last_checked,
            ];
        }

        return $merged;
    }

    public static function checkLink($url)
    {
        $response = Http::withHeaders([
            'User-Agent' => 'SafariLinkCheckerBot/1.0'
        ])->withoutRedirecting()->timeout(config('linkscanner.timeout'))->get($url);

        $status = $response->status();

        if (in_array($status, [301, 302, 303, 307, 308])) {
            $redirect_url = $response->header('Location');
        }

        return (object) [
            'status' => $status,
            'redirect_url' => $redirect_url ?? null,
        ];
    }
}

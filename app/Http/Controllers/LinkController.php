<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Helpers\Helpers;
use App\Models\Operator;
use App\Models\CheckHistory;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class LinkController extends Controller
{

    public function list(Request $request)
    {
        try {
            
            // Get filter values from the request, with safe defaults
            $filter = $request->filter ?? [];

            $filter_3xx = $filter['status_3xx'] ?? false;
            $filter_4xx = $filter['status_4xx'] ?? false;
            $filter_5xx = $filter['status_5xx'] ?? false;
            $filter_operators = $filter['operators'] ?? false;
            $filter_accommodations = $filter['accommodations'] ?? false;

            // build an array of status code ranges to filter by, if any
            $statusRanges = [];
            if ($filter_3xx) $statusRanges[] = [300, 399];
            if ($filter_4xx) $statusRanges[] = [400, 499];
            if ($filter_5xx) $statusRanges[] = [500, 599];

            // flags to determine filtering logic
            $statusFilterEnabled = count($statusRanges) > 0;
            $typeFilterEnabled = $filter_operators || $filter_accommodations;

            // if no filters are applied at all, show everything
            $returnAll = !$statusFilterEnabled && !$typeFilterEnabled;

            // determine if we should include accommodations and/or operators
            $includeOperators = $returnAll || $filter_operators || !$typeFilterEnabled;
            $includeAccommodations = $returnAll || $filter_accommodations || !$typeFilterEnabled;

            // prepare collections
            $accommodations = collect();
            $operators = collect();

            // fetch accommodations if included
            if ($includeAccommodations) {
                $accommodations = Accommodation::query()
                    ->whereNotNull('last_checked')
                    ->when($statusFilterEnabled, function ($query) use ($statusRanges) {
                        
                        // apply status filter ranges (if any)
                        $query->where(function ($subQuery) use ($statusRanges) {
                            foreach ($statusRanges as $range) {
                                $subQuery->orWhereBetween('last_status', $range);
                            }
                        });
                    }, function ($query) {
                        // exclude 200 status
                        $query->where('last_status', '!=', 200);
                    })
                    ->orderBy('id', 'asc')
                    ->get();
            }

            // fetch operators if included
            if ($includeOperators) {
                $operators = Operator::query()
                    ->whereNotNull('last_checked')
                    ->when($statusFilterEnabled, function ($query) use ($statusRanges) {
                        $query->where(function ($subQuery) use ($statusRanges) {
                            foreach ($statusRanges as $range) {
                                $subQuery->orWhereBetween('last_status', $range);
                            }
                        });
                    }, function ($query) {
                        $query->where('last_status', '!=', 200);
                    })
                    ->orderBy('id', 'asc')
                    ->get();
            }

            // merge collections
            return Helpers::mergeCollections($accommodations, $operators);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function history(Request $request)
    {
        $website = $request->input('website');

        return CheckHistory::where('website', $website)->orderBy('id', 'desc')->get();
    }

    public function check(Request $request)
    {
        // get the website
        $website = $request->input('website');

        // check if website parameter is present
        if (empty($website)) {
            return response()->json([
                'message' => 'Website URL is required'
            ], 422);
        }

        try {
            // use a helper method to check the link
            $response = Helpers::checkLink($website);

            // try to find a matching Accommodation or Operator by website
            $link = Accommodation::where('website', $website)->first()
                ?? Operator::where('website', $website)->first();

            // no matching record is found
            if (!$link) {
                return response()->json([
                    'message' => 'Link not found'
                ], 404);
            }

            // update the model
            $link->update([
                'last_status'  => $response->status,
                'last_checked' => now(),
            ]);

            // create a new entry in the check history log
            CheckHistory::create([
                'website'       => $link->website,
                'status'        => $response->status,
                'redirect_url'  => $response->redirect_url,
            ]);

            // success response
            return response()->json([
                'message' => 'Link check completed',
            ]);
        } catch (Throwable $e) {

            // something went wrong
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

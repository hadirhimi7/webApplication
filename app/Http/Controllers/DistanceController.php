<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DistanceController extends Controller
{
    public function calculateDistanceFromRequest(Request $request)
    {
        $pickup = $request->input('pickup_lat') . ',' . $request->input('pickup_lng');
        $dropoff = $request->input('dropoff_lat') . ',' . $request->input('dropoff_lng');

        $url = config('services.distance_matrix.url');
        $key = config('services.distance_matrix.key');

        $response = Http::get($url, [
            'origins' => $pickup,
            'destinations' => $dropoff,
            'key' => $key,
        ]);

        if ($response->ok() && isset($response['rows'][0]['elements'][0]['distance']['value'])) {
            $distanceInKm = round($response['rows'][0]['elements'][0]['distance']['value'] / 1000, 2);
            return response()->json(['distance_km' => $distanceInKm]);
        } else {
            return response()->json(['error' => 'Distance calculation failed.'], 400);
        }
    }
}

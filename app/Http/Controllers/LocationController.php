<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function getCoordinates(Request $request)
    {
        $query = $request->input('location');

        $response = Http::get(env('OPENCAGE_API_URL'), [
            'q' => $query,
            'key' => env('OPENCAGE_API_KEY'),
            'limit' => 5,
            'language' => 'en',
            // 'countrycode' => 'lb', // optional
        ]);

        $data = $response->json();

        return response()->json($data['results']);
    }
}

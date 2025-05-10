<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Delivery;
use App\Models\Driver;

class ClientDashboardController extends Controller
{
    public function dashboard()
    {
        $this->updateUserCoordinatesFromIP();
        return view('client.dashboard');
    }

    public function updateLocation(Request $request)
    {
        $user = auth()->user();

        $response = Http::get(env('IP_LOCATION_API'));

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['lat'], $data['lon'])) {
                $user->latitude = $data['lat'];
                $user->longitude = $data['lon'];
                $user->save();

                return response()->json(['success' => true, 'lat' => $data['lat'], 'lon' => $data['lon']]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Unable to fetch location'], 500);
    }

    public function createDelivery()
    {
        $this->updateUserCoordinatesFromIP();

        $client = auth()->user();

        $drivers = Driver::with('user')->get()->filter(function ($driver) use ($client) {
            if ($driver->user->latitude && $driver->user->longitude && $client->latitude && $client->longitude) {
                $distance = $this->calculateDistance(
                    $client->latitude,
                    $client->longitude,
                    $driver->user->latitude,
                    $driver->user->longitude
                );
                return $distance <= 4;
            }
            return false;
        });

        return view('client.create-delivery', ['drivers' => $drivers]);
    }

    public function browseDrivers($deliveryId = null)
    {
        $this->updateUserCoordinatesFromIP();
        $client = auth()->user();

        $drivers = Driver::with('user')->get()->filter(function ($driver) use ($client) {
            if (
                $driver->user->latitude && $driver->user->longitude &&
                $client->latitude && $client->longitude
            ) {
                $distance = $this->calculateDistance(
                    $client->latitude, $client->longitude,
                    $driver->user->latitude, $driver->user->longitude
                );
                return $distance <= 4;
            }
            return false;
        });

        return view('client.browse-drivers', [
            'drivers' => $drivers,
            'delivery' => $deliveryId ? Delivery::findOrFail($deliveryId) : null,
        ]);
    }

    public function myDeliveries()
    {
        $deliveries = Delivery::where('client_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('client.my-deliveries', compact('deliveries'));
    }

    public function storeDelivery(Request $request)
    {
        $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'package_size' => 'required|string',
            'package_weight' => 'required|numeric',
            'urgency' => 'required|in:normal,urgent',
            'payment_method' => 'required|in:Credit Card,Crypto,Cash on Delivery',
            'driver_id' => 'nullable|exists:users,id',
            'pickup_lat' => 'required|numeric',
            'pickup_lng' => 'required|numeric',
            'dropoff_lat' => 'required|numeric',
            'dropoff_lng' => 'required|numeric',
        ]);

        $distance = $this->calculateDistance(
            $request->pickup_lat, $request->pickup_lng,
            $request->dropoff_lat, $request->dropoff_lng
        );

        $price = 0;

        if ($request->driver_id) {
            $driver = Driver::where('user_id', $request->driver_id)->first();
            if ($driver) {
                if ($driver->pricing_model === 'fixed') {
                    $price += $driver->fixed_rate;
                } elseif ($driver->pricing_model === 'per_km') {
                    $price += round($driver->rate_per_km * $distance, 2);
                }

                $price += round($request->package_weight * $driver->weight_multiplier, 2);

                if ($request->urgency === 'urgent') {
                    $price += 5;
                }

                switch (strtolower($request->package_size)) {
                    case 'medium':
                        $price += 5;
                        break;
                    case 'large':
                        $price += 10;
                        break;
                }
            }
        }

        Delivery::create([
            'client_id' => auth()->id(),
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'package_size' => $request->package_size,
            'package_weight' => $request->package_weight,
            'urgency' => $request->urgency,
            'payment_method' => $request->payment_method,
            'distance' => $distance,
            'price' => $price,
            'driver_id' => $request->driver_id,
            'status' => 'Pending',
        ]);

        return redirect()->route('client.myDeliveries')->with('success', 'Delivery created successfully!');
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return round($earthRadius * $c, 2);
    }

    public function assignDriverForm($deliveryId)
    {
        $delivery = Delivery::findOrFail($deliveryId);
        $drivers = User::where('role', 'driver')->get();

        return view('client.assign-driver', compact('delivery', 'drivers'));
    }

    public function assignDriver(Request $request, $deliveryId)
    {
        $request->validate([
            'driver_id' => 'required|exists:users,id',
        ]);

        $delivery = Delivery::findOrFail($deliveryId);
        $delivery->driver_id = $request->driver_id;
        $delivery->status = 'Accepted';
        $delivery->save();

        return redirect()->route('client.myDeliveries')->with('success', 'Driver assigned successfully!');
    }

    private function updateUserCoordinatesFromIP()
    {
        $user = auth()->user();

        $response = Http::get(env('IP_LOCATION_API'));

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['lat'], $data['lon'])) {
                $user->latitude = $data['lat'];
                $user->longitude = $data['lon'];
                $user->save();
            }
        }
    }
}

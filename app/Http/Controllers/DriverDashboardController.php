<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Delivery;
use App\Models\Driver;

class DriverDashboardController extends Controller
{
    public function dashboard()
    {
        $deliveries = \App\Models\Delivery::with('client') // Make sure 'client' relationship exists in Delivery model
        ->where('driver_id', auth()->id())
            ->where('status', 'Pending')
            ->get();

        return view('driver.dashboard', compact('deliveries'));
    }


    public function updateLocation(Request $request)
    {
        $user = auth()->user();

        // Fetch location from IP API
        $response = Http::get(env('IP_LOCATION_API')); // IP_LOCATION_API should be set in .env

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
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Accepted,Declined',
        ]);

        $delivery = Delivery::where('driver_id', auth()->id())->findOrFail($id);
        $delivery->status = $request->status;
        $delivery->save();

        return redirect()->back()->with('success', 'Delivery status updated.');
    }

    public function activeDeliveries()
    {
        $deliveries = Delivery::with('client')
            ->where('driver_id', auth()->id())
            ->where('status', 'active')
            ->get();

        return view('driver.active-deliveries', compact('deliveries'));
    }

    public function inProgressDeliveries()
    {
        $deliveries = Delivery::with('client')
            ->where('driver_id', auth()->id())
            ->where('status', 'In Progress')
            ->get();

        return view('driver.active-deliveries', compact('deliveries'));
    }

    public function showDelivery(Delivery $delivery)
    {
        if ($delivery->driver_id !== auth()->id()) {
            abort(403);
        }

        return view('driver.delivery-details', compact('delivery'));
    }

    public function deliveryHistory()
    {
        $deliveries = Delivery::where('driver_id', auth()->id())
            ->where('status', 'delivered')
            ->orderByDesc('updated_at')
            ->get();

        return view('driver.delivery-history', compact('deliveries'));
    }

    public function map() {
        return view('driver.map');
    }

    public function profile()
    {
        $driver = Driver::where('user_id', auth()->id())->firstOrFail();
        return view('driver.profile', compact('driver'));
    }

    public function updatePricing(Request $request)
    {
        $driver = Driver::where('user_id', auth()->id())->firstOrFail();

        if ($driver->pricing_model === 'fixed') {
            $request->validate(['fixed_rate' => 'required|numeric|min:0']);
            $driver->fixed_rate = $request->fixed_rate;
        } elseif ($driver->pricing_model === 'per_km') {
            $request->validate(['rate_per_km' => 'required|numeric|min:0']);
            $driver->rate_per_km = $request->rate_per_km;
        }

        $driver->save();

        return redirect()->back()->with('success', 'Pricing updated successfully.');
    }

    public function changePricingModel(Request $request)
    {
        $request->validate([
            'pricing_model' => 'required|in:fixed,per_km',
        ]);

        $driver = Driver::where('user_id', auth()->id())->firstOrFail();
        $driver->pricing_model = $request->pricing_model;

        if ($request->pricing_model === 'fixed') {
            $driver->rate_per_km = null;
        } else {
            $driver->fixed_rate = null;
        }

        $driver->save();

        return redirect()->route('driver.profile')->with('success', 'Pricing model updated successfully.');
    }

    public function updateVehicle(Request $request)
    {
        $validated = $request->validate([
            'vehicle_type' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'license_details' => 'required|in:M,A,Z,N,J,B',
        ]);

        $driver = Driver::where('user_id', auth()->id())->firstOrFail();
        $driver->update($validated);

        return redirect()->route('driver.profile')->with('success', 'Vehicle information updated successfully.');
    }

    public function updateDeliveryStatus(Request $request, Delivery $delivery)
    {
        $request->validate([
            'status' => 'required|in:Accepted,In Progress,Delivered,Cancelled',
        ]);

        $delivery->status = $request->status;
        $delivery->save();

        return redirect()->back()->with('success', 'Delivery status updated successfully.');
    }

    public function updateUserCoordinatesFromIP()
    {
        $user = auth()->user();
        $ipApiUrl = env('IP_LOCATION_API', 'http://ip-api.com/json/');

        $response = Http::get($ipApiUrl);

        if ($response->successful() && isset($response['lat'], $response['lon'])) {
            $user->latitude = $response['lat'];
            $user->longitude = $response['lon'];
            $user->save();
        }
    }

    public function performance() {
        return view('driver.performance');
    }

    public function notifications() {
        return view('driver.notifications');
    }

    public function payments() {
        return view('driver.payments');
    }

    public function support() {
        return view('driver.support');
    }
}

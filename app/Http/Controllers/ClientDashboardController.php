<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery; // ✅ Import the Delivery model

class ClientDashboardController extends Controller
{
    public function dashboard()
    {
        return view('client.dashboard');
    }

    public function createDelivery()
    {
        return view('client.create-delivery');
    }

    public function browseDrivers()
    {
        return view('client.browse-drivers');
    }

    public function myDeliveries()
    {
        $deliveries = \App\Models\Delivery::where('client_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('client.my-deliveries', compact('deliveries'));    
    }

    public function storeDelivery(Request $request)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'package_size' => 'required|string',
            'package_weight' => 'required|numeric',
            'urgency' => 'required|in:normal,urgent',
            'payment_method' => 'required|in:Credit Card,Crypto,Cash on Delivery',
        ]);

        Delivery::create([
            'client_id' => auth()->id(),
            'pickup_location' => $validated['pickup_location'],
            'dropoff_location' => $validated['dropoff_location'],
            'package_size' => $validated['package_size'],
            'package_weight' => $validated['package_weight'],
            'urgency' => $validated['urgency'],
            'payment_method' => $validated['payment_method'],
            'status' => 'Pending', // default status
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Delivery created successfully!');
    }
}
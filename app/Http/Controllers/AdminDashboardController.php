<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Delivery;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalDrivers = Driver::count();
        $totalDeliveries = Delivery::count();
        $totalRevenue = Delivery::sum('price');

        return view('admin.dashboard', compact('totalDrivers', 'totalDeliveries', 'totalRevenue'));
    }

    public function manageDrivers()
    {
        $drivers = Driver::all();
        return view('admin.manage-drivers', compact('drivers'));
    }

    public function updateDriverStatus(Request $request, $id, $status)
    {
        $validStatuses = ['approved', 'suspended', 'blocked'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->route('admin.manageDrivers')->with('error', 'Invalid status');
        }

        $driver = Driver::find($id);
        if (!$driver) {
            return redirect()->route('admin.manageDrivers')->with('error', 'Driver not found');
        }

        $driver->status = $status;
        $driver->save();

        return redirect()->route('admin.manageDrivers')->with('success', 'Driver status updated');
    }

    public function deliveries()
    {
        $deliveries = Delivery::with('client')->get();
        return view('admin.deliveries', compact('deliveries'));
    }

    public function viewDelivery($id)
    {
        $delivery = Delivery::with('client')->find($id);
        if (!$delivery) {
            return redirect()->route('admin.deliveries')->with('error', 'Delivery not found');
        }

        return view('admin.view-delivery', compact('delivery'));
    }

    public function reports()
    {
        $totalRevenue = Delivery::sum('price');
        $totalDeliveries = Delivery::count();
        return view('admin.reports', compact('totalRevenue', 'totalDeliveries'));
    }
}

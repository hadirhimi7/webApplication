@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Drivers -->
        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition duration-300">
            <h4 class="text-lg font-semibold text-gray-700">Total Drivers</h4>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalDrivers }}</p>
        </div>

        <!-- Total Deliveries -->
        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition duration-300">
            <h4 class="text-lg font-semibold text-gray-700">Total Deliveries</h4>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalDeliveries }}</p>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition duration-300">
            <h4 class="text-lg font-semibold text-gray-700">Total Revenue</h4>
            <p class="text-3xl font-bold text-emerald-600 mt-2">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>
</div>
@endsection

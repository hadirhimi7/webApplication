@extends('client.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Welcome to Your Dashboard!</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">Create New Delivery</h2>
            <p class="mb-4">Start a new delivery request easily.</p>
            <a href="{{ route('client.createDelivery') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Create</a>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">Browse Drivers</h2>
            <p class="mb-4">Choose the best driver for your needs.</p>
            <a href="{{ route('client.browseDrivers') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Browse</a>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">View My Deliveries</h2>
            <p class="mb-4">Track your past and current deliveries.</p>
            <a href="{{ route('client.myDeliveries') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">View</a>
        </div>
    </div>
@endsection
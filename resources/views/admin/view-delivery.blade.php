@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Delivery Details</h1>

    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Client: {{ $delivery->client->name }}</h2>

        <div class="space-y-2 text-sm text-gray-700">
            <p><strong>Pickup Location:</strong> {{ $delivery->pickup_location }}</p>
            <p><strong>Dropoff Location:</strong> {{ $delivery->dropoff_location }}</p>
            <p><strong>Package Size:</strong> {{ $delivery->package_size }}</p>
            <p><strong>Package Weight:</strong> {{ $delivery->package_weight }} kg</p>
            <p><strong>Status:</strong> <span class="capitalize">{{ $delivery->status }}</span></p>
            <p><strong>Price:</strong> ${{ number_format($delivery->price, 2) }}</p>
            <p><strong>Scheduled Date:</strong> {{ $delivery->scheduled_date }}</p>
        </div>
    </div>

    <a href="{{ route('admin.deliveries') }}"
       class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">
       Back to Deliveries
    </a>
</div>
@endsection

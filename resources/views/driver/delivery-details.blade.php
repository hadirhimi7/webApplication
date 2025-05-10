@extends('driver.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Delivery #{{ $delivery->id }} Details</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Client Information</h2>
        <ul class="text-gray-700 space-y-2">
            <li><strong>Name:</strong> {{ $delivery->client->name ?? 'N/A' }}</li>
            <li><strong>Email:</strong> {{ $delivery->client->email ?? 'N/A' }}</li>
        </ul>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Delivery Info</h2>
        <ul class="text-gray-700 space-y-2">
            <li><strong>Pickup Location:</strong> {{ $delivery->pickup_location }}</li>
            <li><strong>Dropoff Location:</strong> {{ $delivery->dropoff_location }}</li>
            <li><strong>Status:</strong> {{ $delivery->status }}</li>
            <li><strong>Package Size:</strong> {{ $delivery->package_size }}</li>
            <li><strong>Package Weight:</strong> {{ $delivery->package_weight }} kg</li>
            <li><strong>Urgency:</strong> {{ ucfirst($delivery->urgency) }}</li>
            <li><strong>Payment Method:</strong> {{ $delivery->payment_method }}</li>
            <li><strong>Created At:</strong> {{ $delivery->created_at->format('d M Y, H:i') }}</li>
        </ul>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Update Delivery Status</h2>

        <form method="POST" action="{{ route('driver.updateDeliveryStatus', $delivery->id) }}" class="flex gap-4 items-center">
            @csrf
            @method('PATCH')

            <select name="status" class="p-2 border rounded">
                <option disabled>Select Status</option>
                <option value="Accepted" {{ $delivery->status === 'Accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="In Progress" {{ $delivery->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Delivered" {{ $delivery->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="Cancelled" {{ $delivery->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Status
            </button>
        </form>
    </div>

@endsection

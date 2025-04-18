@extends('client.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Create New Delivery</h1>

<form method="POST" action="{{ route('client.storeDelivery') }}" class="grid grid-cols-1 gap-6 bg-white p-8 rounded shadow-md">
    @csrf

    <div>
        <label class="block text-gray-700">Pickup Location</label>
        <input type="text" name="pickup_location" class="w-full border-gray-300 rounded p-2 mt-1" required>
    </div>

    <div>
        <label class="block text-gray-700">Drop-off Location</label>
        <input type="text" name="dropoff_location" class="w-full border-gray-300 rounded p-2 mt-1" required>
    </div>

    <div>
        <label class="block text-gray-700">Package Size</label>
        <select name="package_size" class="w-full border-gray-300 rounded p-2 mt-1">
            <option>Small</option>
            <option>Medium</option>
            <option>Large</option>
        </select>
    </div>

    <div>
        <label class="block text-gray-700">Package Weight (kg)</label>
        <input type="number" name="package_weight" class="w-full border-gray-300 rounded p-2 mt-1" required>
    </div>

    <div>
        <label class="block text-gray-700">Delivery Urgency</label>
        <div class="flex items-center gap-6 mt-2">
            <label><input type="radio" name="urgency" value="normal" checked> Normal</label>
            <label><input type="radio" name="urgency" value="urgent"> Urgent</label>
        </div>
    </div>

    <div>
        <label class="block text-gray-700">Payment Method</label>
        <select name="payment_method" class="w-full border-gray-300 rounded p-2 mt-1">
            <option>Credit Card</option>
            <option>Crypto</option>
            <option>Cash on Delivery</option>
        </select>
    </div>

    <div class="text-right">
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Submit Delivery</button>
    </div>
</form>
@endsection
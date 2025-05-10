@extends('driver.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">My Profile</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Profile Information</h2>
        <ul class="text-gray-700 space-y-2">
            <li><strong>Name:</strong> {{ auth()->user()->name }}</li>
            <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
            <li><strong>Vehicle Type:</strong> {{ $driver->vehicle_type }}</li>
            <li><strong>Plate Number:</strong> {{ $driver->plate_number }}</li>
            <li><strong>License Details:</strong> {{ $driver->license_details }}</li>
            <li><strong>Pricing Model:</strong> {{ ucfirst($driver->pricing_model) }}</li>

            @if($driver->pricing_model === 'fixed')
                <li><strong>Fixed Rate per Delivery:</strong> {{ $driver->fixed_rate ?? 'Not set' }}</li>
            @elseif($driver->pricing_model === 'per_km')
                <li><strong>Rate per Kilometer:</strong> {{ $driver->rate_per_km ?? 'Not set' }}</li>
            @endif
        </ul>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Update Pricing</h2>
        <form action="{{ route('driver.updatePricing') }}" method="POST" class="space-y-4">
            @csrf
            @method('POST')

            @if($driver->pricing_model === 'fixed')
                <div>
                    <label for="fixed_rate" class="block font-medium">Fixed Rate per Delivery</label>
                    <input type="number" step="0.01" name="fixed_rate" id="fixed_rate" class="w-full p-2 border rounded" value="{{ $driver->fixed_rate }}">
                </div>
            @elseif($driver->pricing_model === 'per_km')
                <div>
                    <label for="rate_per_km" class="block font-medium">Rate per Kilometer</label>
                    <input type="number" step="0.01" name="rate_per_km" id="rate_per_km" class="w-full p-2 border rounded" value="{{ $driver->rate_per_km }}">
                </div>
            @endif

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update</button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Change Pricing Model</h2>
        <form action="{{ route('driver.changePricingModel') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="pricing_model" class="block font-medium">Select Pricing Model</label>
                <select name="pricing_model" id="pricing_model" class="w-full p-2 border rounded">
                    <option value="fixed" {{ $driver->pricing_model === 'fixed' ? 'selected' : '' }}>Fixed Rate</option>
                    <option value="per_km" {{ $driver->pricing_model === 'per_km' ? 'selected' : '' }}>Per Kilometer</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Change Model</button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Update Vehicle Details</h2>
        <form action="{{ route('driver.updateVehicle') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="vehicle_type" class="block font-medium">Vehicle Type</label>
                <input type="text" name="vehicle_type" id="vehicle_type" class="w-full p-2 border rounded"
                       value="{{ $driver->vehicle_type }}" required>
            </div>

            <div>
                <label for="plate_number" class="block font-medium">Plate Number</label>
                <input type="text" name="plate_number" id="plate_number" class="w-full p-2 border rounded"
                       value="{{ $driver->plate_number }}" required>
            </div>

            <div>
                <label for="license_details" class="block font-medium">License Details</label>
                <select name="license_details" id="license_details" class="w-full p-2 border rounded" required>
                    @foreach(['M', 'A', 'Z', 'N', 'J', 'B'] as $option)
                        <option value="{{ $option }}" {{ $driver->license_details === $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Vehicle Info</button>
        </form>
    </div>


@endsection

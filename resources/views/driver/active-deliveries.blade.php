@extends('driver.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Deliveries In Progress</h1>

    @if($deliveries->isEmpty())
        <p class="text-gray-600">No deliveries are currently in progress.</p>
    @else
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full text-left text-sm text-gray-700">
                <thead class="bg-gray-100 font-semibold uppercase text-gray-600 border-b">
                <tr>
                    <th class="px-6 py-3">Client Name</th>
                    <th class="px-6 py-3">Client Email</th>
                    <th class="px-6 py-3">Pickup</th>
                    <th class="px-6 py-3">Dropoff</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Price ($)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deliveries as $delivery)
                    <tr onclick="window.location='{{ route('driver.showDelivery', $delivery->id) }}'" class="cursor-pointer border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $delivery->client->name ?? 'N/A' }}</td>
                        <td class="py-3 px-6 text-left">{{ $delivery->client->email ?? 'N/A' }}</td>
                        <td class="py-3 px-6 text-left">{{ $delivery->pickup_location }}</td>
                        <td class="py-3 px-6 text-left">{{ $delivery->dropoff_location }}</td>
                        <td class="py-3 px-6 text-left">{{ $delivery->status }}</td>
                        <td class="py-3 px-6 text-left">{{ $delivery->price ?? '0.00' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

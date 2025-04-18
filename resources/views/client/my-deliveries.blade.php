@extends('client.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">My Deliveries</h1>

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <tr>
            <th class="py-3 px-6 text-left">Pickup</th>
            <th class="py-3 px-6 text-left">Drop-off</th>
            <th class="py-3 px-6 text-left">Package Size</th>
            <th class="py-3 px-6 text-left">Urgency</th>
            <th class="py-3 px-6 text-left">Status</th>
            <th class="py-3 px-6 text-left">Created At</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
        @forelse($deliveries as $delivery)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left">{{ $delivery->pickup_location }}</td>
                <td class="py-3 px-6 text-left">{{ $delivery->dropoff_location }}</td>
                <td class="py-3 px-6 text-left">{{ $delivery->package_size }}</td>
                <td class="py-3 px-6 text-left">{{ ucfirst($delivery->urgency) }}</td>
                <td class="py-3 px-6 text-left">{{ $delivery->status }}</td>
                <td class="py-3 px-6 text-left">{{ $delivery->created_at->format('d M Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-gray-500">No deliveries yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
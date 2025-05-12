@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Deliveries</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3">Client Name</th>
                    <th class="px-6 py-3">Pickup Location</th>
                    <th class="px-6 py-3">Dropoff Location</th>
                    <th class="px-6 py-3">Package Size</th>
                    <th class="px-6 py-3">Package Weight</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($deliveries as $delivery)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $delivery->client->name }}</td>
                        <td class="px-6 py-4">{{ $delivery->pickup_location }}</td>
                        <td class="px-6 py-4">{{ $delivery->dropoff_location }}</td>
                        <td class="px-6 py-4">{{ $delivery->package_size }}</td>
                        <td class="px-6 py-4">{{ $delivery->package_weight }}</td>
                        <td class="px-6 py-4 capitalize">{{ $delivery->status }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.viewDelivery', ['id' => $delivery->id]) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                               View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

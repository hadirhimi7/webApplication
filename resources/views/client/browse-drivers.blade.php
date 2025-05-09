@extends('client.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Available Drivers In Your Area</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <tr>
            <th class="py-3 px-6 text-left">Name</th>
            <th class="py-3 px-6 text-left">Email</th>
            <th class="py-3 px-6 text-left">Vehicle Type</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @forelse($drivers as $driver)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left">{{ $driver->user->name ?? 'N/A' }}</td>
                <td class="py-3 px-6 text-left">{{ $driver->user->email ?? 'N/A' }}</td>
                <td class="py-3 px-6 text-left">{{ $driver->vehicle_type ?? 'N/A' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center py-4 text-gray-500">No drivers available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection

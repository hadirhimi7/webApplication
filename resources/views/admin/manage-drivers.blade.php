@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Drivers</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Plate Number</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($drivers as $driver)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $driver->id }}</td>
                        <td class="px-6 py-4">{{ $driver->user->name ?? 'No Name' }}</td>
                        <td class="px-6 py-4">{{ $driver->plate_number }}</td>
                        <td class="px-6 py-4 capitalize">{{ $driver->status ?? 'N/A' }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <!-- Approve -->
                            <form action="{{ route('admin.updateDriverStatus', ['driver' => $driver->id, 'status' => 'approved']) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-xs">Approve</button>
                            </form>

                            <!-- Suspend -->
                            <form action="{{ route('admin.updateDriverStatus', ['driver' => $driver->id, 'status' => 'suspended']) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-xs">Suspend</button>
                            </form>

                            <!-- Block -->
                            <form action="{{ route('admin.updateDriverStatus', ['driver' => $driver->id, 'status' => 'blocked']) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">Block</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

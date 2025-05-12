@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Drivers</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Plate Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drivers as $driver)
            <tr>
                <td>{{ $driver->id }}</td>
                <td>{{ $driver->user->name ?? 'No Name' }}</td>
                <td>{{ $driver->plate_number }}</td>
                <td>{{ $driver->status ?? 'N/A' }}</td>
                <td>
                
                    <form action="{{ route('admin.updateDriverStatus', ['driver' => $driver->id, 'status' => 'approved']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    |
               
                    <form action="{{ route('admin.updateDriverStatus', ['driver' => $driver->id, 'status' => 'suspended']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-warning">Suspend</button>
                    </form>
                    |
                  
                    <form action="{{ route('admin.updateDriverStatus', ['driver' => $driver->id, 'status' => 'blocked']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Block</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

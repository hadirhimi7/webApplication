@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Deliveries</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Pickup Location</th>
                <th>Dropoff Location</th>
                <th>Package Size</th>
                <th>Package Weight</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
            <tr>
                <td>{{ $delivery->client->name }}</td>
                <td>{{ $delivery->pickup_location }}</td>
                <td>{{ $delivery->dropoff_location }}</td>
                <td>{{ $delivery->package_size }}</td>
                <td>{{ $delivery->package_weight }}</td>
                <td>{{ ucfirst($delivery->status) }}</td>
                <td>
                    <a href="{{ route('admin.viewDelivery', ['id' => $delivery->id]) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

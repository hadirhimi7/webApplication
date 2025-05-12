@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Delivery Details</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h4>Client: {{ $delivery->client->name }}</h4>
            <p><strong>Pickup Location:</strong> {{ $delivery->pickup_location }}</p>
            <p><strong>Dropoff Location:</strong> {{ $delivery->dropoff_location }}</p>
            <p><strong>Package Size:</strong> {{ $delivery->package_size }}</p>
            <p><strong>Package Weight:</strong> {{ $delivery->package_weight }} kg</p>
            <p><strong>Status:</strong> {{ ucfirst($delivery->status) }}</p>
            <p><strong>Price:</strong> ${{ number_format($delivery->price, 2) }}</p>
            <p><strong>Scheduled Date:</strong> {{ $delivery->scheduled_date }}</p>
        </div>
    </div>

    <a href="{{ route('admin.deliveries') }}" class="btn btn-secondary">Back to Deliveries</a>
</div>
@endsection

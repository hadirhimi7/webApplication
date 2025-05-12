@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Total Drivers</h4>
                    <p>{{ $totalDrivers }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Total Deliveries</h4>
                    <p>{{ $totalDeliveries }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Total Revenue</h4>
                    <p>${{ number_format($totalRevenue, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

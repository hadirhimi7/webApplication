<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'pickup_location',
        'dropoff_location',
        'package_size',
        'package_weight',
        'urgency',
        'payment_method',
        'status',
        'driver_id',
        'distance',
        'price',
        'scheduled_date',
    ];
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
        public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }



}

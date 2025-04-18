<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('vehicles', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('driver_id');
        $table->string('vehicle_type'); // Car, Truck, Motorcycle
        $table->string('plate_number');
        $table->string('model')->nullable(); // Optional: model of the car
        $table->string('color')->nullable(); // Optional: color of vehicle
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

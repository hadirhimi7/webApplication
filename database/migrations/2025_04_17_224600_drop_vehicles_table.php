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
    Schema::dropIfExists('vehicles');
}

public function down(): void
{
    Schema::create('vehicles', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('driver_id');
        $table->string('vehicle_type');
        $table->string('plate_number');
        $table->string('model')->nullable();
        $table->string('color')->nullable();
        $table->timestamps();
    });
}
};

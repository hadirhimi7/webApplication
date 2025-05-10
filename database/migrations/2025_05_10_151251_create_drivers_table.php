<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('vehicle_type');
            $table->string('plate_number');
            $table->text('license_details');
            $table->string('pricing_model');
            $table->decimal('price_per_delivery', 8, 2)->nullable();
            $table->decimal('price_per_km', 8, 2)->nullable();
            $table->decimal('weight_multiplier', 8, 2)->default(0.10);
            $table->decimal('dimension_multiplier', 8, 2)->default(0.05);
            $table->decimal('fixed_rate', 8, 2)->nullable();
            $table->decimal('rate_per_km', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};

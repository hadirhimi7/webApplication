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
    Schema::create('ratings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('delivery_id');
        $table->unsignedBigInteger('client_id');
        $table->unsignedBigInteger('driver_id');
        $table->unsignedTinyInteger('rating'); // 1 to 5 stars
        $table->text('review')->nullable(); // optional review text
        $table->timestamps();

        // Foreign Keys
        $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
        $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};

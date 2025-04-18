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
    Schema::create('deliveries', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id');
        $table->unsignedBigInteger('driver_id')->nullable(); // Nullable because driver can be assigned later
        $table->string('pickup_location');
        $table->string('dropoff_location');
        $table->string('package_size'); // Could be 'Small', 'Medium', 'Large'
        $table->float('package_weight'); // in kilograms
        $table->float('distance')->nullable(); // in kilometers
        $table->decimal('price', 8, 2)->nullable(); // total price
        $table->enum('status', ['Pending', 'Accepted', 'In Progress', 'Delivered', 'Cancelled'])->default('Pending');
        $table->timestamp('scheduled_date')->nullable();
        $table->timestamps();

        // Foreign Keys
        $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('driver_id')->references('id')->on('users')->onDelete('set null');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
{
    Schema::table('deliveries', function (Blueprint $table) {
        $table->enum('urgency', ['normal', 'urgent'])->default('normal')->after('package_weight');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropColumn('urgency');
        });
    }
};
 
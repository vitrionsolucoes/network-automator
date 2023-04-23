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
        Schema::create('routerboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained();
            $table->foreignId('device_id')->constrained();
            $table->string('hostname')->unique();
            $table->string('ipv4_mgmt_address')->unique()->nullable();
            $table->string('ipv6_mgmt_address')->unique()->nullable();
            $table->string('model')->nullable();
            $table->string('software_version')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routers');
    }
};

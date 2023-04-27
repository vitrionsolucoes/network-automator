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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('hostname')->nullable();
            $table->string('ipv4_address')->unique()->nullable();
            $table->string('ipv6_address')->unique()->nullable();
            $table->integer('snmp_version')->nullable();;
            $table->string('snmp_community')->nullable();;
            $table->string('status');
            $table->foreignId('device_group_id')->constrained()->onDelete('cascade');
            $table->foreignId('device_model_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};

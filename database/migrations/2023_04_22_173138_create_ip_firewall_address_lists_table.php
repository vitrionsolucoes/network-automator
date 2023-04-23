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
        Schema::create('ip_firewall_address_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routerboard_id')->constrained();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('comment')->nullable();
            $table->enum('disabled', ['yes', 'no'])->default('no');
            $table->integer('timeout')->nullable();
            $table->enum('global', [0, 1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_firewall_address_list');
    }
};

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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('priority');
            $table->foreignId('requester_id')->constrained('users')->nullable();
            $table->foreignId('attendant_id')->constrained('users')->nullable();
            $table->string('status')->default('open');
            $table->integer('time_spent')->default(0);
            $table->integer('time_estimate')->nullable();
            $table->timestamp('close_date_estimate')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

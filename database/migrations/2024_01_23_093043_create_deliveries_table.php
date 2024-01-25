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
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('delivery_status');
            $table->string('delivery_address');
            $table->unsignedBigInteger('assigned_driver_id')->nullable();
            $table->dateTime('estimated_delivery_time');
            $table->dateTime('actual_delivery_time')->nullable();
            $table->timestamps();

            // If you have a drivers table, add a foreign key constraint
//            $table->foreign('assigned_driver_id')->references('id')->on('drivers')->onDelete('set null');
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

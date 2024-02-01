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
//        Schema::create('deliveries', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('order_id')->constrained()->onDelete('cascade');
//            $table->string('delivery_status');
//            $table->string('delivery_address');
//            $table->unsignedBigInteger('assigned_driver_id')->nullable();
//            $table->dateTime('estimated_delivery_time');
//            $table->dateTime('actual_delivery_time')->nullable();
//            $table->timestamps();
//
//            // If you have a drivers table, add a foreign key constraint
////            $table->foreign('assigned_driver_id')->references('id')->on('drivers')->onDelete('set null');
//        });
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('rider_id');
            $table->enum('status', ['pending', 'on_delivery', 'delivered', 'cancelled']);
            $table->string('pickup_address');
            $table->string('delivery_address');
            $table->dateTime('scheduled_at');
            $table->dateTime('picked_up_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->timestamps();
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

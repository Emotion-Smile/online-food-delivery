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
        Schema::create('special_offers', function (Blueprint $table) {
            $table->id('offer_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('discount_type');
            $table->float('discount_value');
            $table->date('valid_from');
            $table->date('valid_to');
            $table->integer('minimum_order_value');
            $table->text('applicable_menu_items');
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_offers');
    }
};

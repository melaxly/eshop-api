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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('reference_id')->unique()->nullable();
            $table->json('order_items');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('total_price');
            $table->integer('shipping_fee')->nullable();
            $table->integer('grand_total');
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

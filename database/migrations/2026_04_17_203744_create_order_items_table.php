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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_ID');
            $table->unsignedBigInteger('order_ID');
            $table->unsignedBigInteger('P_ID');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            
            $table->foreign('order_ID')->references('order_ID')->on('orders');
            $table->foreign('P_ID')->references('P_ID')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

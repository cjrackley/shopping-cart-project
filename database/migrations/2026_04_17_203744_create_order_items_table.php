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
        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id('order_item_id');
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('P_id');
                $table->integer('quantity');
                $table->decimal('unit_price', 10, 2);

                $table->foreign('order_id')->references('order_id')->on('orders');
                $table->foreign('p_id')->references('p_id')->on('products');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

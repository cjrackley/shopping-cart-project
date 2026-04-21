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
        if (!Schema::hasTable('products')) {
            Schema::create('shipping', function (Blueprint $table) {
                $table->id('shipping_ID');
                $table->unsignedBigInteger('order_ID')->nullable();
                $table->string('customer_name', 50);
                $table->string('email', 50);
                $table->string('address', 50);
                $table->string('zip_code', 20);

                $table->foreign('order_ID')->references('order_ID')->on('orders');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};

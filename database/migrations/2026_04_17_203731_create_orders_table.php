<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id('order_ID');
                $table->timestamp('order_date')->nullable();
                $table->string('status', 50)->default('in progress');
                $table->decimal('total_amount', 10, 2)->nullable();

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

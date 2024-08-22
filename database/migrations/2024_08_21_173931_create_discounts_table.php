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
        Schema::create('discounts', function (Blueprint $table) {
            $table->uuid('id')->primary();;
            $table->string('discount_name');
            $table->string('discount_description')->nullable();
            $table->string('discount_rate');
            $table->string('discount_start_date')->nullable();
            $table->string('discount_end_date')->nullable();
            $table->enum('discount_status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
            $table->uuid('product_id')->nullable();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};

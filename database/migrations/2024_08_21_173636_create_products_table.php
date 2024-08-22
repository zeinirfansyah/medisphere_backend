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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('product_name');
            $table->text('product_description');
            $table->string('original_price');
            $table->string('product_price');
            $table->string('product_stock');
            $table->string('product_image');
            $table->timestamps();
            $table->foreignId('unit_id');
            $table->string('product_category_id');

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('uid')->default(DB::raw('(UUID())'))->unique();
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->float('original_price');
            $table->float('adjusted_price');
            $table->integer('stock');
            $table->string('product_description')->nullable();
            $table->string('product_image')->nullable();
            $table->timestamps();
            $table->bigInteger('product_category_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();

            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('unit_id')->references('id')->on('units');
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

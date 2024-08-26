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
        Schema::create('supply_transaction_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->default(DB::raw('(UUID())'))->unique();
            $table->integer('quantity');
            $table->float('price');
            $table->timestamps();
            $table->string('supply_transaction_id');
            $table->string('product_id');


            $table->foreign('supply_transaction_id')->references('id')->on('supply_transactions');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_transaction_items');
    }
};

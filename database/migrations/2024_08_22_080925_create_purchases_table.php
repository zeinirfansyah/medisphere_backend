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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_date');
            $table->string('purchase_tax');
            $table->string('purchase_total');
            $table->timestamps();
            $table->string('supplier_id');
            $table->string('purchase_status_id');
            $table->string('user_id');

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('purchase_status_id')->references('id')->on('purchase_statuses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};

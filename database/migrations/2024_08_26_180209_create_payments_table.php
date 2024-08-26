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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->default(DB::raw('(UUID())'))->unique();
            $table->date('payment_date');
            $table->float('amount');
            $table->string('payment_method');
            $table->float('transaction_tax');
            $table->string('payment_status_id');
            $table->string('order_id');
            $table->timestamps();

            $table->foreign('payment_status_id')->references('id')->on('payment_statuses');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

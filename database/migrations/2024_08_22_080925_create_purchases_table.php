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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->default(DB::raw('(UUID())'));
            $table->string('purchase_date');
            $table->string('purchase_tax');
            $table->string('purchase_total');
            $table->timestamps();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('purchase_status_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

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

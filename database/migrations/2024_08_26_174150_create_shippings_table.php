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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->default(DB::raw('(UUID())'))->unique();
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->timestamps();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('shipping_status_id')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('shipping_status_id')->references('id')->on('shipping_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};

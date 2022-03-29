<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('identifier');
            $table->foreignId('order_status_id')->references('id')->on('order_statuses')->onDelete('restrict');
            $table->foreignId('location_id')->references('id')->on('locations')->onDelete('restrict');
            $table->foreignId('destination_id')->references('id')->on('locations')->onDelete('restrict');
            $table->foreignId('truck_id')->nullable()->references('id')->on('fleets')->onDelete('restrict');
            $table->string('order_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

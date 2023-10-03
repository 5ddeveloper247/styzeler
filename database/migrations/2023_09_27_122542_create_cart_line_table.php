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
        Schema::create('cart_line', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id')->nullable();
            $table->string('item_text')->nullable();
            $table->string('item_time_min')->nullable();
            $table->string('item_price')->nullable();
            $table->string('item_type')->nullable();
            $table->string('item_sub_type')->nullable();
            $table->string('item_service')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('cart_line');
    }
};

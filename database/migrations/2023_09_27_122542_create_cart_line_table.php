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
            $table->integer('cart_id')->nullable()->default(null);
            $table->string('item_text')->nullable()->default(null);
            $table->string('item_time_min')->nullable()->default(null);
            $table->string('item_price')->nullable()->default(null);
            $table->string('item_type')->nullable()->default(null);
            $table->string('item_sub_type')->nullable()->default(null);
            $table->string('item_service')->nullable()->default(null);
            $table->date('date')->nullable()->default(null);
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

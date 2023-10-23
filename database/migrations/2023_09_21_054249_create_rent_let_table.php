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
        Schema::create('rent_let', function (Blueprint $table) {
            $table->id();
            $table->string('salon_name');
            $table->string('salon_address');
            $table->string('country');
            $table->string('county');
            $table->string('post_code');
            $table->string('phone', 15);
            $table->text('space_description');
            $table->string('category');
            $table->string('rent_let_category');
            $table->string('rent_let_type');
            $table->float('hourly_rent')->default(0.0);
            $table->float('daily_rent')->default(0.0);
            $table->float('weekly_rent')->default(0.0);
            $table->float('monthly_rent')->default(0.0);
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('status');
            $table->date('date')->default(null);
            $table->integer('user_id');
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
        Schema::dropIfExists('rent_let');
    }
};

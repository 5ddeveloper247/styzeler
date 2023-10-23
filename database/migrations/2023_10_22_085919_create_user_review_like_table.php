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
        Schema::create('user_review_like', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('freelancer_id');
            $table->string('feedback_type');
            $table->string('remarks');
            $table->date('date')->default(null);
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
        Schema::dropIfExists('user_review_like');
    }
};

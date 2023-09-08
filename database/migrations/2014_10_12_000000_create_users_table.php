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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('age')->nullable();
            $table->string('status')->default('Active')->nullable();
            $table->string('profile_type')->nullable();
            $table->text('qualification')->nullable();
            $table->text('hero_image')->nullable();
            $table->text('gallery')->nullable();
            $table->bigInteger('utr_number')->nullable(); // Remove the '20'
            $table->string('languages')->nullable();
            $table->string('rate')->nullable();
            $table->text('zone')->nullable();
            $table->text('resume')->nullable();
            $table->json('data')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

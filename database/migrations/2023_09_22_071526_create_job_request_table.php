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
        Schema::create('job_request', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('type', 20)->nullable();
            $table->string('company_name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('description')->nullable();
            $table->float('salary')->default(0.0)->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('job_request');
    }
};

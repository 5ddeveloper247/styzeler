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
            $table->string('type', 20)->nullable()->default(null);
            $table->string('company_name')->nullable()->default(null);
            $table->string('job_title')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->float('salary')->default(0.0)->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->date('start_date')->nullable()->default(null);
            $table->date('end_date')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->date('date')->default(now());
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

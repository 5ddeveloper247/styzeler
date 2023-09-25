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
        Schema::create('job_apply', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->default(null);
            $table->integer('job_id')->nullable()->default(null);
            $table->string('applicant_name')->nullable()->default(null);
            $table->string('applicant_email')->nullable()->default(null);
            $table->string('applicant_phone', 20)->nullable()->default(null);
            $table->string('applicant_cover_letter')->nullable()->default(null);
            $table->string('applicant_resume')->nullable()->default(null);
            $table->string('status', 20)->nullable()->default(null);
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
        Schema::dropIfExists('job_apply');
    }
};

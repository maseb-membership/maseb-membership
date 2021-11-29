<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasebJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maseb_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->longText('description')->nullable()->default('');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('maseb_job_id')->nullable();
            $table->foreign('maseb_job_id')->references('id')->on('maseb_jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maseb_jobs');
    }
}

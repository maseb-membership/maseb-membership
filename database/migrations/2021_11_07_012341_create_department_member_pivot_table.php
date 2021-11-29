<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentMemberPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_member', function (Blueprint $table) {
            $table->id();
            $table->dateTime('published_at')->nullable();
            $table->bigInteger('published_by')->unsigned()->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
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
        Schema::dropIfExists('department_member');
    }
}

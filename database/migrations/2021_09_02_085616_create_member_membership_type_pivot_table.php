<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberMembershipTypePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_membership_type', function (Blueprint $table) {
            $table->id();
            $table->dateTime('published_at')->nullable();
            $table->bigInteger('published_by')->unsigned()->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBigInteger('membership_type_id');
            $table->foreign('membership_type_id')->references('id')->on('membership_types');
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
        Schema::dropIfExists('member_membership_type');
    }
}

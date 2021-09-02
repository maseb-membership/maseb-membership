<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('membership_status')->default(0);   //1 - active, 0 - not-active, 2 - Self Resigned, 3 - Demoted
            $table->dateTime('registered_at')->nullable();
            $table->bigInteger('registered_by')->unsigned()->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->bigInteger('approved_by')->unsigned()->nullable();
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
        Schema::dropIfExists('members');
    }
}

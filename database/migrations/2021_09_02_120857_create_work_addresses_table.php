<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('workplace_name')->nullable();
            $table->string('city')->nullable();
            $table->string('sub_city')->nullable();
            $table->string('woreda')->nullable();
            $table->string('kebele')->nullable();
            $table->string('phone_no')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
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
        Schema::dropIfExists('work_addresses');
    }
}

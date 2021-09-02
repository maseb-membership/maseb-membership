<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('living_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('sub_city')->nullable();
            $table->string('woreda')->nullable();
            $table->string('kebele')->nullable();
            $table->string('house_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('po_box')->nullable();
            $table->string('email')->unique()->nullable();
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
        Schema::dropIfExists('living_addresses');
    }
}

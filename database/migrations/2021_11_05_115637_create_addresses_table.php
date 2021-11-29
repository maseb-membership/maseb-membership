<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zone_sub_city', 100)->nullable();
            $table->string('kebele', 100)->nullable();
            $table->string('woreda', 100)->nullable();
            $table->string('house_no', 50)->nullable();
            $table->string('phone_mobile', 30)->nullable();
            $table->string('phone_mobile_2', 30)->nullable();
            $table->string('phone_fixed_line', 30)->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}

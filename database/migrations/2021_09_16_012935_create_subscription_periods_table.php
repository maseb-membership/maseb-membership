<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->tinyInteger('period_no')->unsigned()->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
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
        Schema::dropIfExists('subscription_periods');
    }
}

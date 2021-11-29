<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodicPaymentsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodic_payments', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->nullable()->default(0.00);
            $table->string('reciept_no', 100)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('method', 100)->nullable(); // (cash, CBE, paypal, CBE Birr, ...)
            $table->timestamps();

        });

        Schema::table('periodic_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBigInteger('subscription_period_id');
            $table->foreign('subscription_period_id')->references('id')->on('subscription_periods');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodic_payments');
    }
}

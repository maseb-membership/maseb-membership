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
            $table->string('maseb_code', 100)->nullable();

            $table->tinyInteger('membership_status')->default(0);   //0 - suspended, 1 - active, 2 - Self Resigned, 3 - Demoted

            $table->tinyInteger('job_type')->nullable(); //0 - None, 1 - Government Employee, 2 - Private Employee, 3 - NGO, 4 - Self Employed
            $table->string('profession', 100)->nullable();
            $table->string('special_talents', 512)->nullable();
            $table->tinyInteger('heard_about_maseb_from')->nullable(); //Null - N/A, 1 - Radio, 2 - Books, 3 - Member, 4 - Facebook, 5 - youtube, 6 - Telegram, 7 - Tweeter, 8 - Hiking, 9 - Website, 10 - Rather Not Say
            $table->tinyInteger('not_forced_to_pay')->nullable(); //0 - yes/forced , 1 - no/honarable membership, 2 - no/unable to pay
            $table->tinyInteger('registration_method')->nullable();   //Null - N/A, 1 - Post, 2 - Telegram, 3 - In-person, 4 - Website, 5 - Email
            $table->date('registration_date')->nullable();
            $table->float('registration_fee_paid_amount')->nullable();

            $table->tinyInteger('registration_payment_method')->default(0); // 0/Null - N/A, 1 - CBE, 2 - Abyssinia, 3 - Cash


            // $table->dateTime('published_at')->nullable();
            // $table->bigInteger('published_by')->unsigned()->nullable();

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

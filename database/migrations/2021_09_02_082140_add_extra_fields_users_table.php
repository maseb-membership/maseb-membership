<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->string('name_en')->nullable();
            // $table->string('maseb_id', 20)->unique();

            $table->string('father_name')->nullable();
            // $table->string('last_name_en')->nullable();

            $table->string('grand_father_name')->nullable();
            // $table->string('grand_father_name_en')->nullable();

            $table->string('mother_name')->nullable();
            // $table->string('mother_name_en')->nullable();

            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('age')->nullable();

            $table->tinyInteger('marital_status')->default(0); //0 - Not Married, 1 - Maried, 2 - Widowed
            $table->string('nationality')->nullable();
            $table->tinyInteger('account_status')->default(1); //Account > 0: not active, 1: active

            $table->bigInteger('member_id')->unsigned()->nullable()->default(null);

            $table->tinyInteger('is_approved')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(
                'father_name',
                'grand_father_name',
                'mother_name',
                'gender',
                'birth_date',
                'martial_status',
                'nationality',
                'account_status',
                // 'member_id',
                'maseb_job_id',
                'is_approved',
            );
        });
    }
}

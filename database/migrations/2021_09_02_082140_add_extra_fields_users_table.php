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
            $table->string('last_name')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->tinyInteger('marital_status')->default(0); //0 - Not Married, 1 - Maried, 2 - Widowed
            $table->tinyInteger('status')->default(1); //Account > 0: not active, 1: active
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
                'last_name',
                'grand_father_name',
                'mother_name',
                'gender',
                'birth_date',
                'martial_status',
                'status',
                'member_id',
                'is_approved',
            );
        });
    }
}

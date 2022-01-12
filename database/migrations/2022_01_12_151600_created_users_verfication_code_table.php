<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedUsersVerficationCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_verfication_code', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('user_id')->unsigned();
            $table ->string('code');
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_verfication_code', function (Blueprint $table) {
            Schema::dropIfExists('users_verificationCodes');
        });
    }
}

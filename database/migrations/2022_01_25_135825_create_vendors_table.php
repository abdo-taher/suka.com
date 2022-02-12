<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table ->string('firstName');
            $table ->string('lastName');
            $table ->string('store_name')->unique();
            $table ->string('email')->unique();
            $table ->string('password');
            $table ->integer('category_id')->unsigned();
            $table ->string('address');
            $table ->string('personal_phone');
            $table ->string('work_phone')->unique();
            $table ->string('home_phone');
            $table ->string('id_card_face');
            $table ->string('id_card_back');
            $table ->boolean('is_active')->nullable()->default('0');
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
        Schema::dropIfExists('vendors');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedWishListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wish_list', function (Blueprint $table) {
            $table ->integer('user_id')->unsigned();
            $table ->integer('product_id')->unsigned();
            $table ->timestamps();
            $table ->primary(['user_id','product_id']);
            $table ->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table ->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wish_list', function (Blueprint $table) {
            Schema::dropIfExists('wish_lists');
        });
    }
}

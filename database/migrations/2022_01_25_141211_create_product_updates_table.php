<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_updates', function (Blueprint $table) {
            $table ->increments('id');
            $table ->string('update_from');
            $table ->string('update_to');
            $table ->integer('admin_create')->unsigned();
            $table ->integer('product_id')->unsigned();
            $table ->unique(['admin_create','product_id']);
            $table ->foreign('admin_create')->references('id')->on('admins')->onDelete('cascade');
            $table ->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_updates');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_updates', function (Blueprint $table) {
            $table ->increments('id');
            $table ->string('updates');
            $table ->integer('category_id')->unsigned();
            $table ->integer('admin_create')->unsigned();
            $table ->unique(['category_id','admin_create']);
            $table ->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table ->foreign('admin_create')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('category_updates');
    }
}

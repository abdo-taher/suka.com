<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_translations', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('tag_id')->unsigned();
            $table ->string('locale');
            $table ->string('name');
            $table ->unique(['tag_id','locale']);
            $table ->foreign('key_id')->references('id')->on('keys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_translations', function (Blueprint $table) {
            Schema::dropIfExists('tag_translations');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('option_translations', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('option_id')->unsigned();
            $table ->string('locale');
            $table ->string('name');
            $table ->unique(['option_id','locale']);
            $table ->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table ->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('option_translations', function (Blueprint $table) {
            Schema::dropIfExists('option_translations');
        });
    }
}

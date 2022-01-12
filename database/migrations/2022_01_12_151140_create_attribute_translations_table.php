<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attribute_translations', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('attribute_id');
            $table ->string('locale');
            $table ->string('name');
            $table ->unique(['attribute_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribute_translations', function (Blueprint $table) {
            Schema::dropIfExists('attribute_translations');
        });
    }
}

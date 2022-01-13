<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateProductTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('product_translations', function (Blueprint $table) {
                $table ->string('name');
                $table ->longText('description');
                $table ->text('short_text');
                $table ->unique(['product_id','locale']);
                $table ->foreign('product_id')->references('id')->on('Products')->onDelete('cascade');
            });




        DB::statement("ALTER TABLE product_translation ADD FULLTEXT(name)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

           Schema::dropIfExists('product_translation');

    }
}

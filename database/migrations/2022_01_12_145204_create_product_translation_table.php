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
        Schema::table('product_translation', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('product_id');
            $table ->string('locale');
            $table ->string('name');
            $table ->longText('description');
            $table ->text('short_text');
            $table ->unique(['product_id','locale']);
            $table ->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            DB::statement('ALTER TABLE product_translations ADD FULLTEXT(name)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_translation', function (Blueprint $table) {
           Schema::dropIfExists('product_translations');
        });
    }
}

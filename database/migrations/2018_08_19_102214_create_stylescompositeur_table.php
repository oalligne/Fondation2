<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylescompositeurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stylescompositeur', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('compositeurs_id')->unsigned();
            $table->foreign('compositeurs_id')
                  ->references('id')
                  ->on('compositeurs')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('styles_id')->unsigned();
            $table->foreign('styles_id')
                  ->references('id')
                  ->on('styles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('stylescompositeur', function(Blueprint $table) {
            $table->dropForeign('stylescompositeur_compositeurs_id_foreign');
            $table->dropForeign('stylescompositeur_styles_id_foreign');
        });
        Schema::drop('stylescompositeur');
    }
}

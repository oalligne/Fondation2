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
        Schema::create('compositeur_style', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('compositeur_id')->unsigned();
            $table->foreign('compositeur_id')
                  ->references('id')
                  ->on('compositeurs')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('style_id')->unsigned();
            $table->foreign('style_id')
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
        Schema::table('compositeur_style', function(Blueprint $table) {
            $table->dropForeign('compositeur_style_compositeur_id_foreign');
            $table->dropForeign('compositeur_style_style_id_foreign');
        });
        Schema::drop('compositeur_style');
    }
}

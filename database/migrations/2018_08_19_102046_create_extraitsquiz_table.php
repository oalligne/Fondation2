<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraitsquizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('extraitsquiz', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quizzes_id')->unsigned();
            $table->foreign('quizzes_id')
                  ->references('id')
                  ->on('quizzes')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('extraits_id')->unsigned();
            $table->foreign('extraits_id')
                  ->references('id')
                  ->on('extraits')
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
        Schema::table('extraitsquiz', function(Blueprint $table) {
            $table->dropForeign('extraitsquiz_quizzes_id_foreign');
            $table->dropForeign('extraitsquiz_extraits_id_foreign');
        });
        Schema::drop('extraitsquiz');
    }
}

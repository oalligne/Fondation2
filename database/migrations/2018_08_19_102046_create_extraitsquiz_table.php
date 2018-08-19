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
            $table->integer('quiz_id')->unsigned();
            $table->foreign('quiz_id')
                  ->references('id')
                  ->on('quizzes')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('extrait_id')->unsigned();
            $table->foreign('extrait_id')
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
            $table->dropForeign('extraitsquiz_quizz_id_foreign');
            $table->dropForeign('extraitsquiz_extrait_id_foreign');
        });
        Schema::drop('extraitsquiz');
    }
}

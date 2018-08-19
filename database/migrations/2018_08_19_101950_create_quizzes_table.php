<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('quizzes', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom', 128);
            $table->string('difficulte', 64);
            $table->text('description');
            $table->integer('typesquiz_id')->unsigned();
            $table->foreign('typesquiz_id')
                  ->references('id')
                  ->on('typesquiz')
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
        Schema::table('quizzes', function(Blueprint $table) {
            $table->dropForeign('quizzes_typesquiz_id_foreign');
        });
        Schema::drop('quizzes');
    }
}

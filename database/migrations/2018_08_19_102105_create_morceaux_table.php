<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMorceauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('morceaux', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom', 256);
            $table->date('date_creation');
            $table->integer('compositeur_id')->unsigned();
            $table->foreign('compositeur_id')
                  ->references('id')
                  ->on('compositeurs')
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
        Schema::table('morceaux', function(Blueprint $table) {
            $table->dropForeign('morceaux_compositeur_id_foreign');
        });
        Schema::drop('morceaux');
    }
}

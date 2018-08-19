<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('extraits', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('url', 256);
            $table->string('source', 256);
            $table->integer('debut')->unsigned();
            $table->integer('fin')->unsigned();
            $table->integer('morceau_id')->unsigned();
            $table->foreign('morceau_id')
                  ->references('id')
                  ->on('morceaux')
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
        Schema::table('extraits', function(Blueprint $table) {
            $table->dropForeign('extraits_morceau_id_foreign');
        });
        Schema::drop('extraits');
    }
}

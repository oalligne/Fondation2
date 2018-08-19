<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompositeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('compositeurs', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom', 128);
            $table->string('prenom', 128);
            $table->string('url_photo', 256);
            $table->text('description');
            $table->string('source', 256);
            $table->date('date_naissance');
            $table->date('date_mort');
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
        Schema::drop('compositeurs');
    }
}

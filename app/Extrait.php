<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extrait extends Model
{
    //
     protected $table = 'extraits';

    public function morceau()
    {
        return $this->belongsTo('App\Morceau');
    } 

}

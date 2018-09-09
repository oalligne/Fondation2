<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Morceau extends Model
{
    //
    protected $table = 'morceaux';

    public function compositeur()
    {
        return $this->belongsTo('App\Compositeur');
    } 
}

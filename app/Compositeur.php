<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Style;

class Compositeur extends Model
{
    //
     protected $table = 'compositeurs';

    //protected $fillable = ['titre','contenu','user_id'];

	public function styles()
	{
		return $this->belongsToMany(Style::class);
	} 
}

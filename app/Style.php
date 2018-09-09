<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Compositeur;

class Style extends Model
{
    //
    protected $table = 'styles';
    protected $fillable = ['nom','description','source'];

	public function compositeurs()
	{
		return $this->belongsToMany(Compositeur::class);
	} 
}

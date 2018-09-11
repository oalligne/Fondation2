<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $table = 'quizzes';
    protected $fillable = ['code'];

	public function extraits()
	{
		return $this->belongsToMany(Extrait::class);
	} 

}

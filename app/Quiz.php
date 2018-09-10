<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $table = 'quizzes';
    protected $fillable = ['code'];

	public function quizs()
	{
		return $this->belongsToMany(Quiz::class);
	} 
}

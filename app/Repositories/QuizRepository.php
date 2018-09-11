<?php

namespace App\Repositories;

use App\Quiz;
use App\Extraits;

class QuizRepository implements QuizRepositoryInterface
{
	protected $Quiz;

    public function __construct(Quiz $Quiz)
	{
		$this->Quiz = $Quiz;
	}

	public function saveQuiz(Quiz $Quiz, Array $inputs)
	{
		$Quiz->nom = $inputs['nom'];
		$Quiz->difficulte = $inputs['difficulte'];
		$Quiz->description = $inputs['description'];	
		$Quiz->typequiz_id = $inputs['typequiz_id'];	

		$Quiz->save();
	}

	public function getPaginate($n)
	{
		return $this->Quiz->paginate($n);
	}

	public function store(Array $inputs)
	{
		$Quiz = new $this->Quiz;		

		$this->saveQuiz($Quiz, $inputs);

		return $Quiz;
	}

	public function getById($id)
	{
		return $this->Quiz->findOrFail($id);
	}

	public function update($id, Array $inputs, $extraits)
	{
		$Quiz = $this->Quiz->findOrFail($id);
		$Quiz->extraits()->detach();

		foreach ($extraits as $extrait_id) {
			$Quiz->extraits()->attach($extrait_id);
		}

		$this->saveQuiz($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$Quiz = $this->Quiz->findOrFail($id);
		$Quiz->extraits()->detach();
		$Quiz->delete();
	}


	private function queryWithQuizAndExtraits()
	{
		return $this->Quiz->with('Extraits')
		->orderBy('quizzes.created_at', 'desc');		
	}

	public function getWithQuizAndExtraitsPaginate($n)
	{
		return $this->queryWithQuizAndExtraits()->paginate($n);
	}

	public function getWithQuizAndExtraitsForExtraitPaginate($extrait, $n)
	{
		return $this->queryWithQuizAndExtraits()
		->whereHas('extraits', function($q) use ($extrait)
		{
		  $q->where('extraits.id', $extrait);
		})->paginate($n);
	}

}
<?php

namespace App\Repositories;

use App\TypeQuiz;
use Illuminate\Support\Str;

class TypeQuizRepository implements TypeQuizRepositoryInterface
{
	protected $TypeQuiz;

    public function __construct(TypeQuiz $TypeQuiz)
	{
		$this->TypeQuiz = $TypeQuiz;
	}

	public function saveTypeQuiz(TypeQuiz $TypeQuiz, Array $inputs)
	{
		$TypeQuiz->code = $inputs['code'];

		$TypeQuiz->save();
	}

	public function getPaginate($n)
	{
		return $this->TypeQuiz->paginate($n);
	}

	public function store($inputs)
	{
		$TypeQuiz = new $this->TypeQuiz;		

		$this->saveTypeQuiz($TypeQuiz, $inputs);
	}

	public function getById($id)
	{
		return $this->TypeQuiz->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->saveTypeQuiz($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
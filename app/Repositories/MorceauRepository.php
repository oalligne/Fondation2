<?php

namespace App\Repositories;

use App\Morceau;
use Illuminate\Support\Str;

class MorceauRepository implements MorceauRepositoryInterface
{
	protected $Morceau;

    public function __construct(Morceau $Morceau)
	{
		$this->Morceau = $Morceau;
	}

	public function saveMorceau(Morceau $Morceau, Array $inputs)
	{
		$Morceau->nom = $inputs['nom'];
		$Morceau->date_creation = $inputs['date_creation'];
		$Morceau->compositeur_id = $inputs['compositeurs'];

		$Morceau->save();
	}

	public function getPaginate($n)
	{
		return $this->Morceau->paginate($n);
	}

	public function store($inputs)
	{
		$Morceau = new $this->Morceau;		

		$this->saveMorceau($Morceau, $inputs);
	}

	public function getById($id)
	{
		return $this->Morceau->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->saveMorceau($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
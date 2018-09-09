<?php

namespace App\Repositories;

use App\Extrait;
use Illuminate\Support\Str;

class ExtraitRepository implements ExtraitRepositoryInterface
{
	protected $Extrait;

    public function __construct(Extrait $Extrait)
	{
		$this->Extrait = $Extrait;
	}

	public function saveExtrait(Extrait $Extrait, Array $inputs)
	{
		$Extrait->debut = $inputs['debut'];
		$Extrait->fin = $inputs['fin'];
		$Extrait->url = $inputs['url'];
		$Extrait->source = $inputs['source'];
		$Extrait->morceau_id = $inputs['morceaux'];

		$Extrait->save();
	}

	public function getPaginate($n)
	{
		return $this->Extrait->paginate($n);
	}

	public function store($inputs)
	{
		$Extrait = new $this->Extrait;		

		$this->saveExtrait($Extrait, $inputs);
	}

	public function getById($id)
	{
		return $this->Extrait->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->saveExtrait($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
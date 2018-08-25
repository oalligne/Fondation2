<?php

namespace App\Repositories;

use App\Style;

class StyleRepository implements StyleRepositoryInterface
{
	protected $Style;

    public function __construct(Style $Style)
	{
		$this->Style = $Style;
	}

	public function saveStyle(Style $Style, Array $inputs)
	{
		$Style->nom = $inputs['nom'];
		$Style->source = $inputs['source'];
		$Style->description = $inputs['description'];	

		$Style->save();
	}

	public function getPaginate($n)
	{
		return $this->Style->paginate($n);
	}

	public function store(Array $inputs)
	{
		$Style = new $this->Style;		

		$this->saveStyle($Style, $inputs);

		return $Style;
	}

	public function getById($id)
	{
		return $this->Style->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->saveStyle($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
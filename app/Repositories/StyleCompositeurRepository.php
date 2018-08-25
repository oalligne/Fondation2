<?php

namespace App\Repositories;

use App\StyleCompositeur;

class StyleCompositeurRepository implements StyleCompositeurRepositoryInterface
{
	protected $StyleCompositeur;

    public function __construct(StyleCompositeur $StyleCompositeur)
	{
		$this->StyleCompositeur = $StyleCompositeur;
	}

	public function saveStyleCompositeur(StyleCompositeur $StyleCompositeur, Array $inputs)
	{
		$StyleCompositeur->style_id = $inputs['style_id'];
		$StyleCompositeur->compositeur_id = $inputs['compositeur_id'];

		$StyleCompositeur->save();
	}

	public function getPaginate($n)
	{
		return $this->StyleCompositeur->paginate($n);
	}

	public function store(Array $inputs)
	{
		$StyleCompositeur = new $this->StyleCompositeur;		

		$this->saveStyleCompositeur($StyleCompositeur, $inputs);

		return $StyleCompositeur;
	}

	public function getById($id)
	{
		return $this->StyleCompositeur->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->saveStyleCompositeur($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
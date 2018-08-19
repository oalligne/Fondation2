<?php

namespace App\Repositories;

use App\Compositeur;

class CompositeurRepository implements CompositeurRepositoryInterface
{
	protected $Compositeur;

    public function __construct(Compositeur $Compositeur)
	{
		$this->Compositeur = $Compositeur;
	}

	public function saveCompositeur(Compositeur $Compositeur, Array $inputs)
	{
		$Compositeur->nom = $inputs['nom'];
		$Compositeur->prenom = $inputs['prenom'];
		$Compositeur->url_photo = $inputs['url_photo'];
		$Compositeur->description = $inputs['description'];	
		$Compositeur->source = $inputs['source'];	
		$Compositeur->date_naissance = $inputs['date_naissance'];	
		$Compositeur->date_mort = $inputs['date_mort'];	

		$Compositeur->save();
	}

	public function getPaginate($n)
	{
		return $this->Compositeur->paginate($n);
	}

	public function store(Array $inputs)
	{
		$Compositeur = new $this->Compositeur;		

		$this->saveCompositeur($Compositeur, $inputs);

		return $Compositeur;
	}

	public function getById($id)
	{
		return $this->Compositeur->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->saveCompositeur($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
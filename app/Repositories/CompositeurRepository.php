<?php

namespace App\Repositories;

use App\Compositeur;
use App\Style;

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

	public function update($id, Array $inputs, $styles)
	{
		$Compositeur = $this->Compositeur->findOrFail($id);
		$Compositeur->styles()->detach();

		foreach ($styles as $style_id) {
			$Compositeur->styles()->attach($style_id);
		}

		$this->saveCompositeur($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$Compositeur = $this->Compositeur->findOrFail($id);
		$Compositeur->styles()->detach();
		$Compositeur->delete();
	}


	private function queryWithCompositeurAndStyles()
	{
		return $this->Compositeur->with('Styles')
		->orderBy('compositeurs.created_at', 'desc');		
	}

	public function getWithCompositeurAndStylesPaginate($n)
	{
		return $this->queryWithCompositeurAndStyles()->paginate($n);
	}

	public function getWithCompositeurAndStylesForStylePaginate($style, $n)
	{
		return $this->queryWithCompositeurAndStyles()
		->whereHas('styles', function($q) use ($style)
		{
		  $q->where('styles.nom', $style);
		})->paginate($n);
	}

}
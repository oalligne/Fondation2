@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-3  offset-md-1">
	    <div class="card border-primary">
	      <div class="card-header">Quiz du jour</div>
	      <div class="card-body">
	        <p class="card-text">Essayez le quiz du jour pour remporter jusqu'à 50 points</p>
	        <button type="button" class="btn btn-primary btn-sm">Démarrer >></button>
	      </div>
	    </div>
    </div>
    <div class="col-md-3">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Classement</h5>
	        <p class="card-text">1- Xirius 20 pts <br/>2- Ninou 15 pts <br/>3- John 8 pts<br/></p>
	        <button type="button" class="btn btn-primary btn-sm">Voir tout le classement</button>
	      </div>
	    </div>
    </div>
    <div class="col-md-3">
		<div class="card border-info">
		  <div class="card-header">Nouveautés</div>
		  <div class="card-body text-info">
		    <h5 class="card-title">Nouvelles fonctionnalités</h5>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
	</div>

</div>
<br/>
<div class="row" >
	<div class="col-md-10 offset-md-1" >
	<h3>Quiz Aléatoires</h3>
	<hr/>
	</div>
</div>
<div class="row" >
	<div class="col-md-3 offset-md-1">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Les meilleurs morceaux de Beethoven</h5>
	        <p class="card-text">- Sonate au clair de lune <br/> - Concerto pour violon <br/>- ... <br/></p>
	        <button type="button" class="btn btn-primary btn-sm">Démarrer >></button>
	      </div>
	    </div>
    </div>
    <div class="col-md-3">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Les opéras de Mozart</h5>
	        <p class="card-text">- Sonate au clair de lune <br/> - Concerto pour violon <br/>- ... <br/></p>
	        <button type="button" class="btn btn-primary btn-sm">Démarrer >></button>
	      </div>
	    </div>
    </div>
    <div class="col-md-3">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Les concertos pour violon</h5>
	        <p class="card-text">- Sonate au clair de lune <br/> - Concerto pour violon <br/>- ... <br/></p>
	        <button type="button" class="btn btn-primary btn-sm">Démarrer >></button>
	      </div>
	    </div>
    </div>
</div>
</div>
@endsection
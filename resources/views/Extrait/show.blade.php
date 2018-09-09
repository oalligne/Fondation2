@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche d'extrait</div>
			<div class="panel-body"> 
				<p>Debut : {{ $extrait->debut }}</p>
				<p>Fin : {{ $extrait->fin }}</p>
				<p>Source : {{ $extrait->source }}</p>
				<p>Url : {{ $extrait->url }}</p>
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection
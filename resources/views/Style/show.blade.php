@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche de style</div>
			<div class="panel-body"> 
				<p>Nom : {{ $Style->nom }}</p>
				<p>Description : {{ $Style->description }}</p>
				<p>Source : {{ $Style->source }}</p>
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection
@extends('template')

@section('contenu')
	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un morceau</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'morceau.store', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('date_creation') ? 'has-error' : '' !!}">
					  	{!! Form::date('date_creation', null, ['class' => 'form-control', 'placeholder' => 'Date de création']) !!}
					  	{!! $errors->first('date_creation', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {{ $errors->has('compositeur') ? 'has-error' : '' }}">
						<select class="form-control" id="compositeurs" name="compositeurs">
						    @foreach ($compositeurs as $compositeur)
						        <option value="{{ $compositeur->id }}">{{ $compositeur->prenom }} {{ $compositeur->nom }}</option>
						    @endforeach
						</select>
					</div>


					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection
@extends('template')

@section('contenu')
	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un style</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'style.store', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
					  	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}
					  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('source') ? 'has-error' : '' !!}">
					  	{!! Form::text('source', null, ['class' => 'form-control', 'placeholder' => 'source']) !!}
					  	{!! $errors->first('source', '<small class="help-block">:message</small>') !!}
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
@extends('template')

@section('contenu')
	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un compositeur</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'compositeur.store', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
					  	{!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'prenom']) !!}
					  	{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
					  	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}
					  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('date_naissance') ? 'has-error' : '' !!}">
					  	{!! Form::date('date_naissance', null, ['class' => 'form-control', 'placeholder' => 'date_naissance']) !!}
					  	{!! $errors->first('date_naissance', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('date_mort') ? 'has-error' : '' !!}">
					  	{!! Form::date('date_mort', null, ['class' => 'form-control', 'placeholder' => 'date_mort']) !!}
					  	{!! $errors->first('date_mort', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('source') ? 'has-error' : '' !!}">
					  	{!! Form::text('source', null, ['class' => 'form-control', 'placeholder' => 'source']) !!}
					  	{!! $errors->first('source', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('url_photo') ? 'has-error' : '' !!}">
					  	{!! Form::text('url_photo', null, ['class' => 'form-control', 'placeholder' => 'url_photo']) !!}
					  	{!! $errors->first('url_photo', '<small class="help-block">:message</small>') !!}
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
@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un extrait</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($extrait, ['route' => ['extrait.update', $extrait->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('debut') ? 'has-error' : '' !!}">
					  	{!! Form::text('debut', null, ['class' => 'form-control', 'placeholder' => 'Début']) !!}
					  	{!! $errors->first('debut', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('fin') ? 'has-error' : '' !!}">
					  	{!! Form::text('fin', null, ['class' => 'form-control', 'placeholder' => 'Fin']) !!}
					  	{!! $errors->first('fin', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('url') ? 'has-error' : '' !!}">
					  	{!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
					  	{!! $errors->first('url', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('source') ? 'has-error' : '' !!}">
					  	{!! Form::text('source', null, ['class' => 'form-control', 'placeholder' => 'Source']) !!}
					  	{!! $errors->first('source', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {{ $errors->has('morceau') ? 'has-error' : '' }}">
						<select class="form-control" id="morceaux" name="morceaux">
						    @foreach ($morceaux as $morceau)
						        <option value="{{ $morceau->id }}"  {{ $extrait->morceau->id == $morceau->id ? 'selected="selected"' : '' }}>
						        	{{ $morceau->nom }}
						        </option>
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
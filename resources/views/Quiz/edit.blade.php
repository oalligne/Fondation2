@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un quiz</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($quiz, ['route' => ['quiz.update', $quiz->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('difficulte') ? 'has-error' : '' !!}">
					  	{!! Form::text('difficulte', null, ['class' => 'form-control', 'placeholder' => 'difficulte']) !!}
					  	{!! $errors->first('difficulte', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
					  	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}
					  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {{ $errors->has('typesquiz') ? 'has-error' : '' }}">
						{{ Form::select('typesquiz', $typesquiz, $quiz->typequiz,array('multiple'=>'multiple', 'id' => 'nom','class' => 'form-control')) }}
					</div>
					<div class="form-group {{ $errors->has('extraits') ? 'has-error' : '' }}">
						<select multiple class="form-control" id="extraits" name="extraits[]">
						    @foreach ($extraits as $extrait)
						        <option value="{{ $extrait->id }}">{{ $extrait->id }}</option>
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
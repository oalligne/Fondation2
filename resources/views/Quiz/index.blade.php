@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-10  offset-md-1">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des quizs</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Difficulte</th>
						<th>Nombre extraits</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($quizs as $quiz)
						<tr>
							<td>{!! $quiz->id !!}</td>
							<td class="text-primary"><strong>{!! $quiz->nom !!}</strong></td>
							<td>{!! $quiz->difficulte !!}</td>							
							<td>{!! $quiz->extraits->count() !!}</td>
							<td>{!! link_to_route('quiz.show', 'Voir', [$quiz->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('quiz.edit', 'Modifier', [$quiz->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['quiz.destroy', $quiz->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce quiz ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('quiz.create', 'Ajouter un quiz', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
</div>
@endsection
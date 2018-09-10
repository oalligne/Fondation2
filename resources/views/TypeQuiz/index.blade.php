@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-10  offset-md-1">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des types de quiz</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Code</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($TypeQuizs as $TypeQuiz)
						<tr>
							<td>{!! $TypeQuiz->id !!}</td>
							<td>{!! $TypeQuiz->code !!}</td>
							<td>{!! link_to_route('typequiz.show', 'Voir', [$TypeQuiz->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('typequiz.edit', 'Modifier', [$TypeQuiz->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['typequiz.destroy', $TypeQuiz->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce TypeQuiz ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('typequiz.create', 'Ajouter un TypeQuiz', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
</div>
@endsection
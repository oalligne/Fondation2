@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-10  offset-md-1">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des morceaux</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Date de création</th>
						<th>Compositeur</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($morceaux as $morceau)
						<tr>
							<td>{!! $morceau->id !!}</td>
							<td>{!! $morceau->nom !!}</td>
							<td>{!! $morceau->date_creation !!}</td>
							<td>{!! $morceau->compositeur->prenom !!} {!! $morceau->compositeur->nom !!}</td>
							</td>
							<td>{!! link_to_route('morceau.show', 'Voir', [$morceau->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('morceau.edit', 'Modifier', [$morceau->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['morceau.destroy', $morceau->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce morceau ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('morceau.create', 'Ajouter un morceau', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
</div>
@endsection
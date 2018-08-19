@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-10  offset-md-1">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des compositeurs</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Date de naissance</th>
						<th>Date de mort</th>
						<th>Description</th>
						<th>Source</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($compositeurs as $compositeur)
						<tr>
							<td>{!! $compositeur->id !!}</td>
							<td class="text-primary"><strong>{!! $compositeur->nom !!}</strong></td>
							<td>{!! $compositeur->prenom !!}</td>
							<td>{!! $compositeur->date_naissance !!}</td>
							<td>{!! $compositeur->date_mort !!}</td>
							<td>{!! $compositeur->description !!}</td>
							<td>{!! $compositeur->source !!}</td>
							<td>{!! link_to_route('compositeur.show', 'Voir', [$compositeur->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('compositeur.edit', 'Modifier', [$compositeur->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['compositeur.destroy', $compositeur->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce compositeur ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('compositeur.create', 'Ajouter un compositeur', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
</div>
@endsection
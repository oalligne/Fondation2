@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-10  offset-md-1">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des extraits</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Début</th>
						<th>Fin</th>
						<th>Source</th>
						<th>URL</th>
						<th>Morceau</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($extraits as $extrait)
						<tr>
							<td>{!! $extrait->id !!}</td>
							<td>{!! $extrait->debut !!}</td>
							<td>{!! $extrait->fin !!}</td>
							<td>{!! $extrait->source !!}</td>
							<td>{!! $extrait->url !!}</td>
							<td>{!! $extrait->morceau->nom !!}</td>
							<td>{!! link_to_route('extrait.show', 'Voir', [$extrait->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('extrait.edit', 'Modifier', [$extrait->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['extrait.destroy', $extrait->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce extrait ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('extrait.create', 'Ajouter un extrait', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
</div>
@endsection
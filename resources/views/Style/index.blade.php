@extends('template')

@section('contenu')
<br/>
<div class="row" >
	 <div class="col-md-10  offset-md-1">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des styles</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Description</th>
						<th>Source</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($Styles as $style)
						<tr>
							<td>{!! $style->id !!}</td>
							<td class="text-primary"><strong>{!! $style->nom !!}</strong></td>
							<td>{!! $style->description !!}</td>
							<td>{!! $style->source !!}</td>
							<td>{!! link_to_route('style.show', 'Voir', [$style->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('style.edit', 'Modifier', [$style->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['style.destroy', $style->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce style ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('style.create', 'Ajouter un style', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
</div>
@endsection
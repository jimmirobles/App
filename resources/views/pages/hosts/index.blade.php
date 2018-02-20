@extends('layouts.principal')

@section('page-title', 'Hosts')

@section('wrapper-title')
	<i class="fa fa-globe"></i> Listado de dominios
@endsection

@section('title-buttons')
	<div class="pull-right">
		<div class="btn-group btn-group-sm" role="group" aria-label="Botones de acciones de tabla">
			<a role="button" href="{{ route('hosts.create') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil fa-fw"></i> Nuevo</a>
			<div class="btn-group btn-group-sm" role="group">
			<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
			<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				<a class="dropdown-item" href="#">Descargar .XLS</a>
			</div>
			</div>
		</div>
	</div>
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-bordered table-sm">
			<thead class="thead-light">
				<tr>
					<th>Fecha Inicial</th>
					<th>Cliente</th>
					<th>Dominio</th>
					<th>Fecha Final</th>
					<th class="text-center"><i class="fa fa-cog fa-lg"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($hosts as $host)
					<tr>
						<td>{{ $host->fecha_inicial }}</td>
						<td>{{ $host->cliente_nombre }}</td>
						<td>{{ $host->dominio }}</td>
						<td><span class="badge badge-success">{{ $host->fecha_final }}</span></td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
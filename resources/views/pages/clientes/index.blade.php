@extends('layouts.principal')

@section('page-title', 'Empresas')

@section('wrapper-title')
	<i class="fa fa-user-circle-o"></i> Clientes
@endsection

@section('title-buttons')
	<div class="pull-right">
		<div class="btn-group btn-group-sm" role="group" aria-label="Botones de acciones de tabla">
			<a role="button" href="{{ route('clientes.create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil fa-fw"></i> Nuevo</a>
			<div class="btn-group btn-group-sm" role="group">
			<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
			<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				<a href="{{ route('excel.exportar', 'clientes') }}" class="dropdown-item">Descargar .XLS</a>
				<a href="{{ route('csv.exportar', 'clientes') }}" class="dropdown-item"> Descargar .CSV</a>
			</div>
			</div>
		</div>
	</div>
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="clients-table">
			<thead>
				<tr>
					<th>RFC</th>
					<th>Nombre</th>
					<th class="text-center"><i class="fa fa-cog fa-lg"></i></th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
@endsection

@section('custom_scripts')
<script>
	$(document).ready(function(){
		$('#clients-table').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"order": [[ 0, "asc" ]],
			"columnDefs": [
				{ "orderable": false, "targets": 2 }
			],
			"processing": true,
			"serverSide": true,
			"ajax": "{{ route('api.clientes') }}",
			"columns":[
				{data: 'rfc'},
				{data: 'razon_social'},
				{data: 'action'},
			]
		});
	});
</script>
@endsection
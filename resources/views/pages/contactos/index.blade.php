@extends('layouts.principal')

@section('page-title', 'Contactos')

@section('wrapper-title', 'Lista de contactos')

@section('title-buttons')
	<div class="pull-right">
		<div class="btn-group btn-group-sm" role="group" aria-label="Botones de acciones de tabla">
			<a role="button" href="{{ route('contactos.create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil fa-fw"></i> Nuevo</a>
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
			<table class="table table-bordered table-sm" id="contacts-table">
				<thead class="thead-light">
					<tr>
						<th>Empresa</th>
						<th>Nombre</th>
						<th>Email</th>
						<th class="text-center"><i class="fa fa-cog fa-lg"></i></th>
					</tr>
				</thead>
				<tbody> </tbody>
			</table>
	</div>
@endsection

@section('custom_scripts')
<script>
	$(document).ready(function(){
		$('#contacts-table').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"order": [[ 0, "asc" ]],
			"columnDefs": [
				{ "orderable": false, "targets": 3 }
			],
			"processing": true,
			"serverSide": true,
			"ajax": "/api/contactos",
			"columns":[
				{data: 'razon_social'},
				{data: 'contacto'},
				{data: 'email'},
				{data: 'action'},
			]
		});
	});
</script>
@endsection
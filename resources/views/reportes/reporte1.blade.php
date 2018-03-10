@extends('layouts.principal')

@section('page-title', 'Reporte 1')

@section('wrapper-title')
	<i class="fa fa-calendar"></i> Documentos: Por rango de fechas
@endsection

@section('content')
	<div class="card">
		<div class="card-header">Parametros del reporte</div>
		<div class="card-body">
			{{ Form::open(['method'=>'GET', 'class' => 'form-inline', 'id' => 'form1']) }}
				<div class="form-group col-4">
					<label for="id_cliente" class="sr-only">Cliente</label>
					{!! Form::select('id_cliente', $clientes->all(), null, ['class'=>'form-control select2', 'style' => 'width:100%;', 'placeholder'=>'Selecciona el cliente...', 'required'])!!}
				</div>
				<div class="form-group col-3">
					<label for="fecha1" class="sr-only">Al:</label>
					{{ Form::text('fecha1', null, ['class' => 'form-control datetimepicker', 'placeholder' => 'Fecha final', 'required']) }}
				</div>
				<div class="form-group col-3">
					<label for="fecha2" class="sr-only">Al:</label>
					{{ Form::text('fecha2', null, ['class' => 'form-control datetimepicker', 'placeholder' => 'Fecha final', 'required']) }}
				</div>
				<div class="col-2 text-right">
					<button type="submit" id="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Ver</button>
					<button type="submit" class="btn btn-danger btn-sm" formaction="{{ route('reporte1-pdf') }}"><i class="fa fa-file-pdf-o"></i> PDF</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
	<!-- /.row -->
	<hr>
	<div class="card">
		<div class="card-header">Resultados</div>
		<div class="card-body table-responsive">
			<table id="resultados" class="table table-striped table-sm" role="table">
				<thead>
					<tr>
						<th>Folio</th>
						<th>Fecha</th>
						<th>Razon Social</th>
						<th>Contacto</th>
						<th>Servicio</th>
						<th>Asesor</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="panel-footer">
		</div>
	</div>
@endsection

@section('custom_scripts')
<script>
	$(function () {
		$('.datetimepicker').datetimepicker({
			format: 'YYYY/MM/DD',
			locale: 'es'
		});
		
		$('.select2').select2({
			theme: "bootstrap",
			width: 'resolve'
		});
		$('#submit').on('click', function(event) {
			event.preventDefault();
			var formulario = $('form').serialize();
			var resultado = $('table#resultados tbody');

			resultado.empty();

			$.get('{{ url('reportes') }}/obtener-datos?' + formulario, function(data) {
				$.each(data, function(valor, display){
					resultado.append('<tr><td>'+display.folio+'</td><td>'+display.fecha+'</td><td>'+display.razon_social+'</td><td>'+display.contacto_nombre+'</td><td>'+display.servicio_nombre+'</td><td>'+display.asesor_nombre+'</td></tr>');
				});
			});
		});
	});
</script>
@endsection
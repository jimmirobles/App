@extends('layouts.print')

@section('t-folio')
	{{ $documento->folio }}
@endsection

@section('contenido')
<div class="container container-fluid">
	<div class="row">
		<div class="col-md-auto col-lg-3 media-logo">
			<img src="{{ asset('img/logo-512x512.png') }}" alt="logo hb" width="80px" class="img-circle center-block">
		</div>
		<div class="col-lg-6 col-md-auto">
			<h2 class="text-center">Human Business</h2>
		</div>
		<div class="col-lg-3 col-md-auto">
			<div class="text-center">
				<strong>REPORTE DE SERVICIO</strong> <br>
				Fecha: {{ date('d-m-Y', strtotime($documento->fecha)) }} <br>
				Folio: <big>{{ $documento->folio }}</big>
			</div>
		</div>
	</div>
	<hr>
	{{-- /row encabezado --}}
	<div class="row">
		<div class="col table-responsive">
			<table class="table table-bordered table-striped table-sm">
				<tbody>
					<tr>
						<td colspan="1">Cliente:</td>
						<td colspan="3">{{ $documento->razon_social }}</td>
					</tr>
					<tr>
						<td>Contacto:</td>
						<td>{{ $documento->contacto_nombre }}</td>
						<td>Email:</td>
						<td>{{ $documento->contacto_email }}</td>
					</tr>
					<tr>
						<td>Vía:</td>
						<td>
							@if($documento->lugar == 0)
								En sitio
							@else
								Remoto
							@endif
						</td>
						<td>Domicilio:</td>
						<td>{{ $documento->direccion }}</td>
					</tr>
					<tr>
						<td>Tipo:</td>
						@if($documento->tipo == 0)
							<td>Soporte</td>
						@else
							<td>Iguala</td>
						@endif
						<td>Servicio:</td>
						<td>{{ $documento->servicio_nombre }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	{{-- /row datos cliente --}}
	<div class="card mb-3">
		<div class="card-header">
			Error reportado
		</div>
		<div class="card-body table-responsive">
			{{ $documento->error }}
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-header">
			Actividad realizada
		</div>
		<div class="card-body table-responsive">
			{{ $documento->solucion }}
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-header">
			Comentarios adicionales
		</div>
		<div class="card-body table-responsive">
			{{ $documento->comentarios }}
		</div>
	</div>
	{{-- /row contenido --}}
	<div class="row">
		<div class="col">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>
							<hr>
							<div class="text-center">Asesor: {{ $documento->asesor_nombre }}</div>
						</td>
						<td colspan="2">
							<div class="text-center">
								<strong>Hora Inicial: </strong>{{ $documento->hInicial }}<br>
								<strong>Hora Final: </strong>{{ $documento->hFinal }}
							</div>
						</td>
						<td>
							<hr>
							<div class="text-center">Firma de conformidad (cliente)</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
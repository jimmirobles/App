@extends('layouts.print')

@section('t-folio')
	{{ $documento->folio }}
@endsection

@section('contenido')
	<div class="row">
		<div class="col-lg-3 col-xs-3">
			<img src="{{ asset('img/logo-512x512.png') }}" alt="logo hb" width="80px" class="img-circle center-block">
		</div>
		<div class="col-lg-6 col-xs-6">
			<h2 class="text-center">Human Business</h2>
		</div>
		<div class="col-lg-3 col-xs-3">
			<div class="text-center">
				<strong>Reporte de Servicio</strong> <br>
				Fecha: {{ date('d-m-Y', strtotime($documento->fecha)) }} <br>
				Folio: <big>{{ $documento->folio }}</big>
			</div>
		</div>
	</div>
	<hr>
	{{-- /row encabezado --}}
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered table-striped">
				<tbody>
					<tr>
						<td colspan="1">Cliente:</td>
						<td colspan="3">{{ $documento->razon_social }}</td>
					</tr>
					<tr>
						<td class="col-lg-1">Contacto:</td>
						<td class="col-lg-3">{{ $documento->contacto_nombre }}</td>
						<td class="col-lg-1">Email:</td>
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
						@if($documento->tipo === 0)
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
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Error reportado</h3>
				</div>
				<div class="panel-body">{{ $documento->error }}</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Actividad realizada</h3>
				</div>
				<div class="panel-body">{{ $documento->solucion }}</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Comentarios adicionales</h3>
				</div>
				<div class="panel-body">{{ $documento->comentarios }}</div>
			</div>
		</div>
	</div>
	{{-- /row contenido --}}
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td class="col-lg-3">
							<hr>
							<div class="text-center">Asesor: {{ $documento->asesor_nombre }}</div>
						</td>
						<td colspan="2">
							<div class="text-center">
								<strong>Hora Inicial: </strong>{{ $documento->hInicial }}<br>
								<strong>Hora Final: </strong>{{ $documento->hFinal }}
							</div>
						</td>
						<td class="col-lg-3">
							<hr>
							<div class="text-center">Firma de conformidad (cliente)</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	{{-- /row footer --}}
@endsection
@extends('layouts.principal')

@section('page-title', 'Crear documento')

@section('title', 'Crear')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@if(count($errors) > 0)
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			{!! Form::open(['route'=>'documentos.store', 'method'=>'POST']) !!}
				<section class="row">
					<div class="col-lg-2 form-group">
						{!! Form::label('folio', 'Folio:') !!}
						{!! Form::text('folio', $next_folio+1, ['class'=>'form-control date', 'readonly'])!!}
					</div>
					<div class="col-lg-4 form-group">
						{!! Form::label('fecha', 'Fecha:') !!}
						{!! Form::text('fecha', null, ['class'=>'form-control date', 'id' => 'datepicker', 'placeholder'=>'dd/mm/aaaa', 'required'])!!}
					</div>
					<div class="col-lg-3 form-group">
						{!! Form::label('hInicial', 'Hora inicial:') !!}
						{!! Form::text('hInicial', null, ['class' => 'form-control timepicker', 'placeholder' => 'Hora de inicio', 'required'])!!}
					</div>
					<div class="col-lg-3 form-group">
						{!! Form::label('hFinal', 'Hora final:') !!}
						{!! Form::text('hFinal', null, ['class' => 'form-control timepicker', 'placeholder' => 'Hora de finalizacion', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-12 form-group">
						{!! Form::label('empresa', 'Empresa:') !!}
						{!! Form::select('id_empresa', $empresas->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-6 form-group">
						{!! Form::label('sistema', 'Servicio:') !!}
						{!! Form::select('id_servicio', $servicios->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
					<div class="col-lg-6 form-group">
						{!! Form::label('asesor', 'Asesor:') !!}
						{!! Form::select('id_asesor', $asesores->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-12 form-group">
						{!! Form::label('error', 'Error reportado:') !!}
						{!! Form::textarea('error', null, ['class' => 'form-control', 'rows' => '3']) !!}
					</div>
					<div class="col-lg-12 form-group">
						{!! Form::label('solucion', 'Actividad realizada:') !!}
						{!! Form::textarea('solucion', null, ['class' => 'form-control', 'rows' => '3']) !!}
					</div>
					<div class="col-lg-12 form-group">
						{!! Form::label('comentarios', 'Comentrios adicionales:') !!}
						{!! Form::textarea('comentarios', null, ['class' => 'form-control', 'rows' => '3']) !!}
					</div>
				</section>
				<div class="form-group">
					{!! Form::submit('Guardar', ['class'=>'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('custom_scripts')
<script>
	$(function () {
        $('#datepicker').datetimepicker({
        	locale: 'es',
        	format: 'YYYY/MM/DD',
        	daysOfWeekDisabled: [0],
        	showTodayButton: true,
        	showClose: true
        });
        $('.timepicker').datetimepicker({
        	locale: 'es',
        	format: 'hh:mm A',
        	showTodayButton: true,
        	showClose: true
        });
        $('.select2').select2({
        	theme: "bootstrap"
        });
    });
</script>
@endsection
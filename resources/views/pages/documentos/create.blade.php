@extends('layouts.principal')

@section('page-title', 'Crear documento')

@section('title', 'Crear')

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')
			
			{!! Form::open(['route'=>'documentos.store', 'method'=>'POST']) !!}
				<section class="row">
					<div class="col-lg-2 form-group">
						{!! Form::label('folio', 'Folio:') !!}
						{!! Form::text('folio', $next_folio+1, ['class'=>'form-control date', 'readonly'])!!}
					</div>
					<div class="col-lg-2 form-group">
						{!! Form::label('fecha', 'Fecha:') !!}
						{!! Form::text('fecha', null, ['class'=>'form-control date', 'id' => 'datepicker', 'placeholder'=>'dd/mm/aaaa', 'required'])!!}
					</div>
					<div class="col-lg-2 form-group">
						{!! Form::label('hInicial', 'Hora inicial:') !!}
						{!! Form::text('hInicial', null, ['class' => 'form-control timepicker', 'required'])!!}
					</div>
					<div class="col-lg-2 form-group">
						{!! Form::label('hFinal', 'Hora final:') !!}
						{!! Form::text('hFinal', null, ['class' => 'form-control timepicker', 'required'])!!}
					</div>
					<div class="col-lg-4 form-group">
						{!! Form::label('tipo', 'Tipo:') !!}
						{!! Form::select('tipo', ['1' => 'En Sitio', '2' => 'Remoto'], null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-12 form-group">
						{!! Form::label('id_cliente', 'Cliente:') !!}
						{!! Form::select('id_cliente', $empresas->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-6 form-group">
						{!! Form::label('contacto_nombre', 'Contacto:') !!}
						{!! Form::text('contacto_nombre', null, ['class' => 'form-control', 'required'])!!}
					</div>
					<div class="col-lg-6 form-group">
						{!! Form::label('contacto_email', 'Email:') !!}
						{!! Form::email('contacto_email', null, ['class' => 'form-control', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-6 form-group">
						{!! Form::label('id_servicio', 'Servicio:') !!}
						{!! Form::select('id_servicio', $servicios->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
					<div class="col-lg-6 form-group">
						{!! Form::label('id_asesor', 'Asesor:') !!}
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
  		// $("#id_cliente").change(function() {
		//     $("#razon_social").val($(this).find('option:selected').text());
		// });
    });
</script>
@endsection
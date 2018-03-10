@extends('layouts.principal')

@section('page-title', 'Crear documento')

@section('wrapper-title')
	<i class="fa fa-pencil"></i> Crear documento
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')
			
			{!! Form::open(['route'=>'documentos.store', 'method'=>'POST', 'id' => 'myForm']) !!}
				<section class="row">
					<div class="col-lg-3 form-group">
						{!! Form::label('folio', 'Folio:') !!}
						{!! Form::text('folio', $next_folio+1, ['class'=>'form-control', 'readonly'])!!}
					</div>
					<div class="col-lg-3 form-group">
						{!! Form::label('fecha', 'Fecha:') !!}
						{!! Form::date('fecha', \Carbon\Carbon::now(), ['class'=>'form-control', 'required'])!!}
					</div>
					<div class="col-lg-3 form-group">
						{!! Form::label('hInicial', 'Hora inicial:') !!}
						{!! Form::time('hInicial', null, ['class' => 'form-control timepicker', 'required'])!!}
					</div>
					<div class="col-lg-3 form-group">
						{!! Form::label('hFinal', 'Hora final:') !!}
						{!! Form::time('hFinal', null, ['class' => 'form-control timepicker', 'required'])!!}
						{{-- <input type="time" class="form-control"> --}}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-6 form-group">
						{!! Form::label('tipo', 'Tipo:') !!}
						{!! Form::select('tipo', ['0' => 'Soporte', '1' => 'Iguala'], null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
					<div class="col-lg-6 form-group">
						{!! Form::label('lugar', 'Lugar:') !!}
						{!! Form::select('lugar', ['0' => 'En sitio', '1' => 'Remoto'], null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
				</section>
				<section class="row">
					<div class="col-lg-6 form-group">
						{!! Form::label('id_cliente', 'Cliente:') !!}
						{!! Form::select('id_cliente', $empresas->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
					</div>
					<div class="col-lg-6 form-group">
						<label>Contacto:</label>
						<select id="id_contacto" class="form-control select2" name="id_contacto">
							<option value=""></option>
						</select>
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
					{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
					<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('custom_scripts')
<script>
	$(function () {
		$('.timepicker').timepicker({
		    timeFormat: 'HH:mm',
		    dropdown: false
		});
		$('.select2').select2({
			theme: "bootstrap"
		});
		$('#id_cliente').on('change', function(e){
			// console.log(e);
			var cliente_id = e.target.value;
			var contactos = $('#id_contacto');
			$.get('{{ url('documentos') }}/create/ajax-contacto?cliente=' + cliente_id, function(data) {
				// console.log(data);
				contactos.empty();
				$.each(data, function(value, display){
					contactos.append('<option value="' + display.id + '">' + display.nombre + '</option>');
				});
			});
		});
	});
</script>
@endsection
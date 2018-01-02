@extends('layouts.principal')

@section('page-title', 'Crear servicio')

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
			{!! Form::open(['route'=>'empresas.store', 'method'=>'POST']) !!}
				<div class="form-group">
					{!! Form::label('razon_social', 'Nombre: *') !!}
					{!! Form::text('razon_social', null, ['class'=>'form-control', 'placeholder'=>'Inserta la razon social', 'required'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('rfc', 'R.F.C.: *') !!}
					{!! Form::text('rfc', null, ['class'=>'form-control', 'placeholder'=>'XAXX010101000', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('direccion', 'Domicilio:') !!}
					{!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Inserta el domicilio de la empresa'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('correo', 'Correo electronico: *') !!}
					{!! Form::email('correo', null, ['class'=>'form-control', 'placeholder'=>'alguien@mail.com', 'required'])!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Guardar', ['class'=>'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
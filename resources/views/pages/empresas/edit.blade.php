@extends('layouts.principal')

@section('page-title', 'Editar servicio')

@section('title', 'Editar')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::open(['route'=>['empresas.update', $empresa->id], 'method'=>'PUT']) !!}
				<div class="form-group">
					{!! Form::label('razon_social', 'Razón Social de la empresa:') !!}
					{!! Form::text('razon_social', $empresa->razon_social, ['class'=>'form-control', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('rfc', 'R.F.C.: *') !!}
					{!! Form::text('rfc', $empresa->rfc, ['class'=>'form-control', 'placeholder'=>'XAXX010101000', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('direccion', 'Domicilio:') !!}
					{!! Form::text('direccion', $empresa->direccion, ['class'=>'form-control', 'placeholder'=>'Inserta el domicilio de la empresa'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('correo', 'Correo electronico: *') !!}
					{!! Form::email('correo', $empresa->correo, ['class'=>'form-control', 'placeholder'=>'alguien@mail.com', 'required'])!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Actualizar', ['class'=>'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
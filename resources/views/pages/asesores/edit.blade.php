@extends('layouts.principal')

@section('page-title', 'Editar asesor')

@section('title', 'Editar')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::open(['route'=>['asesores.update', $asesor->id], 'method'=>'PUT']) !!}
				<div class="form-group">
					{!! Form::label('nombre', 'Nombre:') !!}
					{!! Form::text('nombre', $asesor->nombre, ['class'=>'form-control', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Correo electronico:') !!}
					{!! Form::text('email', $asesor->email, ['class'=>'form-control', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Actualizar', ['class'=>'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
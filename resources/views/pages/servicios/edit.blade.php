@extends('layouts.principal')

@section('page-title', 'Editar servicio')

@section('title', 'Editar')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::open(['route'=>['servicios.update', $servicio->id], 'method'=>'PUT']) !!}
				<div class="form-group">
					{!! Form::label('nombre', 'Nombre:') !!}
					{!! Form::text('nombre', $servicio->nombre, ['class'=>'form-control', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Actualizar', ['class'=>'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
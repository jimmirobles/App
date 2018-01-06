@extends('layouts.principal')

@section('page-title', 'Crear usuario')

@section('title', 'Nuevo usuario')

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')

			{!! Form::model($usuario, ['route'=>['usuarios.update', $usuario->id], 'method'=>'PUT']) !!}
				@include('forms.usuarios')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
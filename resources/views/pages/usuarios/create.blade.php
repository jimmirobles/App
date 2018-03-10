@extends('layouts.principal')

@section('page-title', 'Crear usuario')

@section('wrapper-title')
	<i class="fa fa-user-plus"></i> Crear usuario
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')

			{!! Form::open(['route'=>'usuarios.store', 'method'=>'POST']) !!}
				@include('forms.usuarios')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
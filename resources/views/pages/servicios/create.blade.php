@extends('layouts.principal')

@section('page-title', 'Crear servicio')

@section('title', 'Crear')

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')

			{!! Form::open(['route'=>'servicios.store', 'method'=>'POST']) !!}
				@include('forms.servicios')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
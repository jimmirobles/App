@extends('layouts.principal')

@section('page-title', 'Crear servicio')

@section('title', 'Crear')

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')
			
			{!! Form::open(['route'=>'empresas.store', 'method'=>'POST']) !!}
				@include('forms.empresas')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
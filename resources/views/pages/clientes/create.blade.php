@extends('layouts.principal')

@section('page-title', 'Nuevo cliente')

@section('wrapper-title')
	<i class="fa fa-pencil"></i> Crear cliente
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')
			
			{!! Form::open(['route'=>'clientes.store', 'method'=>'POST']) !!}
				@include('forms.clientes')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
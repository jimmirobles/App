@extends('layouts.principal')

@section('page-title', 'Editar empresa')

@section('wrapper-title')
	<i class="fa fa-pencil-square-o"></i> Editar cliente
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($cliente, ['route'=>['clientes.update', $cliente->id], 'method'=>'PUT']) !!}
				@include('forms.clientes')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
@extends('layouts.principal')

@section('page-title', 'Editar servicio')

@section('wrapper-title')
	<i class="fa fa-pencil-square-o"></i> Editar servicio
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($servicio, ['route'=>['servicios.update', $servicio->id], 'method'=>'PUT']) !!}
				@include('forms.servicios')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
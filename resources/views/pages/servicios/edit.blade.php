@extends('layouts.principal')

@section('page-title', 'Editar servicio')

@section('title', 'Editar')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($servicio, ['route'=>['servicios.update', $servicio->id], 'method'=>'PUT']) !!}
				@include('forms.servicios')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
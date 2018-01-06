@extends('layouts.principal')

@section('page-title', 'Editar empresa')

@section('title', 'Editar')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($empresa, ['route'=>['empresas.update', $empresa->id], 'method'=>'PUT']) !!}
				@include('forms.empresas')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
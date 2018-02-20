@extends('layouts.principal')

@section('page-title', 'Nuevo host')

@section('wrapper-title')
	<i class="fa fa-pencil"></i> Crear dominio
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')
			
			{!! Form::open(['route'=>'hosts.store', 'method'=>'POST']) !!}
				@include('forms.hosts')
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('custom_scripts')
<script>
	$(function () {
		$('.select2').select2({
			theme: "bootstrap"
		});
	});
</script>
@endsection
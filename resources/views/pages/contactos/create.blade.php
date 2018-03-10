@extends('layouts.principal')

@section('page-title', 'Nuevo contacto')

@section('wrapper-title')
	<i class="fa fa-pencil"></i> Crear contacto
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">

			@include('errors.form-error')
			
			{!! Form::open(['route'=>'contactos.store', 'method'=>'POST']) !!}
				@include('forms.contactos')
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
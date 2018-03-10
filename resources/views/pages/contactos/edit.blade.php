@extends('layouts.principal')

@section('page-title', 'Editar contacto')

@section('wrapper-title')
	<i class="fa fa-pencil-square-o"></i> Editar contact
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($contacto, ['route'=>['contactos.update', $contacto->id], 'method'=>'PUT']) !!}
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
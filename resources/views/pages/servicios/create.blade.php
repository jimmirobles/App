@extends('layouts.principal')

@section('page-title', 'Crear servicio')

@section('title', 'Crear')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@if(count($errors) > 0)
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			{!! Form::open(['route'=>'servicios.store', 'method'=>'POST']) !!}
				<div class="form-group">
					{!! Form::label('nombre', 'Nombre:') !!}
					{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Inserta el nombre del servicio', 'required'])!!}
				</div>
				<div class="form-group">
					{!! Form::submit('Guardar', ['class'=>'btn btn-default']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
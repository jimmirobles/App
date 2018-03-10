@extends('layouts.modal')
@section('modal-id', 'firmaModal')
@section('modal-title', 'Enviar comentarios...')

@section('modal-content')
{{ Form::open(['route' => 'comentarios.store', 'method' => 'POST']) }}
	<div class="modal-body">
		<input type="hidden" name="id_documento" value="{{ $documento->id }}">
		{{ Form::textarea('comentario', null, ['class' => 'form-control', 'required'])}}
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-default">Guardar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	</div>
{{ Form::close() }}
@endsection
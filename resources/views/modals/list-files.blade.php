@extends('layouts.modal')

@section('modal-title', 'Listado de archivos...')

@section('modal-body')
	<div class="modal-body">
		<ul>
		@foreach($files as $file)
			<li>{{ $file }}</li>
		@endforeach
		</ul>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
@endsection
@extends('layouts.modal')

@section('modal-id', 'sendEmailModal')

@section('modal-title', 'Envío de email...')

@section('modal-content')
	{{ Form::open(['route'=>'send', 'method'=>'POST']) }}
	<div class="modal-body">
		<div class="form-group">
			<label>Se enviara un correo a:</label>
			<input type="text" id="email" class="form-control" readonly>
		</div>
		<div class="checkbox">
			<label>
				{!! Form::checkbox('copyJefe', '1', null, ['id' => 'copyJefe']); !!} CC. al supervisor
			</label>
		</div>
		<div class="checkbox">
			<label>
				{!! Form::checkbox('copyMe', '1', null, ['id' => 'copyMe']); !!} CC. a mi
			</label>
		</div>
		{!! Form::hidden('id', null, ['id' => 'id'])!!}
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-info">Enviar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	</div>
	{{ Form::close() }}
@endsection
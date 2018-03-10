<div class="form-group">
	{!! Form::label('cliente_id', 'Cliente: *') !!}
	{!! Form::select('cliente_id', $clientes->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('dominio', 'Dominio: *') !!}
	{!! Form::text('dominio', null, ['class'=>'form-control', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('fecha_inicial', 'Fecha Inicial: *') !!}
	{!! Form::text('fecha_inicial', null, ['class'=>'form-control inputmask', 'placeholder' => 'AAAA/MM/DD', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('fecha_final', 'Fecha Final: *') !!}
	{!! Form::text('fecha_final', null, ['class'=>'form-control inputmask', 'placeholder' => 'AAAA/MM/DD', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar</a>
</div>
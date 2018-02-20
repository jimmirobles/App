<div class="form-group">
	{!! Form::label('id_cliente', 'Cliente:*') !!}
	{!! Form::select('id_cliente', $clientes->all(), null, ['class'=>'form-control select2', 'placeholder'=>'Selecciona algo...', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('nombre', 'Nombre: *') !!}
	{!! Form::text('nombre', null, ['class'=>'form-control', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Correo electrónico: *') !!}
	{!! Form::text('email', null, ['class'=>'form-control', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
</div>
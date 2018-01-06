<div class="form-group">
	{!! Form::label('razon_social', 'Nombre: *') !!}
	{!! Form::text('razon_social', null, ['class'=>'form-control', 'placeholder'=>'Inserta la razon social', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('rfc', 'R.F.C.: *') !!}
	{!! Form::text('rfc', null, ['class'=>'form-control', 'placeholder'=>'XAXX010101000', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion', 'Domicilio:') !!}
	{!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Inserta el domicilio de la empresa'])!!}
</div>
<div class="form-group">
	{!! Form::label('correo', 'Correo electronico: *') !!}
	{!! Form::email('correo', null, ['class'=>'form-control', 'placeholder'=>'alguien@mail.com', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-default']) !!}
</div>
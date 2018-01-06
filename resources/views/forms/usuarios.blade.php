<div class="form-group">
	{!! Form::label('name', 'Nombre(s):') !!}
	{!! Form::text('name', null, ['class'=>'form-control', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@mail.com', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Contraseña:') !!}
	{!! Form::password('password', ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-default']) !!}
</div>
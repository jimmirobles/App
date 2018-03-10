<div class="form-group">
	{!! Form::label('razon_social', 'Nombre: *') !!}
	{!! Form::text('razon_social', null, ['class'=>'form-control', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('rfc', 'R.F.C.: *') !!}
	{!! Form::text('rfc', null, ['class'=>'form-control', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email Supervisor: *') !!}
	{!! Form::email('email', null, ['class'=>'form-control', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::label('direccion', 'Denominacion comercial:') !!}
	{!! Form::text('direccion', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar</a>
</div>
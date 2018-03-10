<div class="form-group">
	{!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Inserta el nombre del servicio', 'required'])!!}
</div>
<div class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar</a>
</div>
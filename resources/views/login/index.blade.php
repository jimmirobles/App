@extends('layouts.login')

@section('formulario')

      {!! Form::open(['route'=>'login', 'method'=>'POST', 'class' => 'form-signin']) !!}
        <h2 class="form-signin-heading">Iniciar sesión</h2>
          {!! Form::label('email', 'Email:', ['class' => 'sr-only']) !!}
          {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'alguien@mail.com', 'required'])!!}
          {!! Form::label('password', 'Contraseña:', ['class' => 'sr-only']) !!}
          {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'******', 'required'])!!}
          {!! Form::submit('Entrar', ['class'=>'btn btn-lg btn-primary btn-block']) !!}
      {!! Form::close() !!}

@endsection
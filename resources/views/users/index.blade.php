@extends('users.master')

@section('title', 'Iniciar Sesión')

@section('content')
	<form action="{{ url('/signin') }}" method="POST">
		<legend>Iniciar Sesión</legend>
		<section>
			<label for="email">
				<i class="fas fa-envelope"></i>
			</label>
			<input type="email" name="email" id="email" placeholder="Correo Electrónico" autocomplete="off" autofocus>
			@if ($errors->has('email'))
				<div>{{ $errors->first('email')}}</div>
			@endif
		</section>
		<section>
			<label for="password">
				<i class="fas fa-key"></i>
			</label>
			<input type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off" autofocus>
			@if ($errors->has('password'))
				<div>{{ $errors->first('password')}}</div>
			@endif
		</section>
		<section>
			<button type="submit">
				Iniciar
			</button>
		</section>
		{{ csrf_field() }}
	</form>
	<a href="{{ url('/crear-cuenta') }}">Crear cuenta</a>
@endsection
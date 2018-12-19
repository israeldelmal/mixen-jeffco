@extends('users.master')

@section('title', 'Crear Cuenta')

@section('content')
	<form action="{{ url('/signup') }}" method="POST">
		<legend>Crear cuenta</legend>
		<section>
			<label for="name">
				<i class="fas fa-user-tag"></i>
			</label>
			<input type="text" name="name" id="name" placeholder="Nombre" autocomplete="off" autofocus value="{{ old('name') }}">
			@if ($errors->has('name'))
				<div>{{ $errors->first('name')}}</div>
			@endif
		</section>
		<section>
			<label for="lastname">
				<i class="fas fa-user-shield"></i>
			</label>
			<input type="text" name="lastname" id="lastname" placeholder="Apellido" autocomplete="off" value="{{ old('lastname') }}">
			@if ($errors->has('lastname'))
				<div>{{ $errors->first('lastname')}}</div>
			@endif
		</section>
		<section>
			<label for="email">
				<i class="fas fa-envelope"></i>
			</label>
			<input type="email" name="email" id="email" placeholder="Correo Electrónico" autocomplete="off" value="{{ old('email') }}">
			@if ($errors->has('email'))
				<div>{{ $errors->first('email')}}</div>
			@endif
		</section>
		<section>
			<label for="password">
				<i class="fas fa-key"></i>
			</label>
			<input type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off" value="{{ old('password') }}">
			@if ($errors->has('password'))
				<div>{{ $errors->first('password')}}</div>
			@endif
		</section>
		<section>
			<label for="cpassword">
				<i class="fas fa-key"></i>
			</label>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confirmar contraseña" autocomplete="off" value="{{ old('cpassword') }}">
			@if ($errors->has('cpassword'))
				<div>{{ $errors->first('cpassword')}}</div>
			@endif
		</section>
		<section>
			<label for="jeffco">
				<i class="fas fa-pen"></i>
			</label>
			<input type="text" name="jeffco" id="jeffco" placeholder="Escribe: Jeffco" autocomplete="off">
			@if ($errors->has('jeffco'))
				<div>{{ $errors->first('jeffco')}}</div>
			@endif
			@if (session()->has('login'))
				<div>{{ session('login') }}</div>
			@endif
		</section>
		<section>
			<button type="submit">
				Crear
			</button>
		</section>
		<input type="hidden" name="jeffco_confirmation" id="jeffco_confirmation" value="Jeffco">
		{{ csrf_field() }}
	</form>
	<a href="{{ url('/crear-cuenta') }}">Iniciar sesión</a>
@endsection
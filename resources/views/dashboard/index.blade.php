@extends('dashboard.master')

@section('title', 'Escritorio')

@section('content')
<section id="index">
	<main>
		<h1>
			<span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
			<a href="{{ url('/escritorio/usuarios') }}"><i class="fas fa-users-cog"></i></a>
			<a href="{{ url('/') }}" target="_blank"><i class="fas fa-home"></i></a>
			<a href="{{ url('/cerrar-sesion') }}"><i class="fas fa-power-off"></i></a>
		</h1>
		<section>
			<a href="{{ url('/escritorio/cabecera') }}">Cabecera</a>
			<a href="{{ url('/escritorio/nosotros/1') }}">Nosotros</a>
			<a href="{{ url('/escritorio/servicios') }}">Servicios</a>
			<a href="{{ url('/escritorio/blog') }}">Blog</a>
			<a href="{{ url('/escritorio/pie/1') }}">Pie de página</a>
		</section>
	</main>
</section>
@endsection
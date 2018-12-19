@extends('web.master')

@section('title', 'JeffCo: Error 403')

@section('nav')
<!-- Navegación -->
<nav>
	<section>
		<a href="{{ url('/') }}">
			<img src="{{ asset('assets/images/isologo.png') }}" alt="Isologo JeffCo">
		</a>
	</section>
	<section>
		<ul>
			<li><a href="{{ url('/') }}#nosotros">Nosotros</a></li>
			<li><a href="{{ url('/') }}#servicios">Servicios</a></li>
			<li><a href="{{ url('/') }}#blog">Blog</a></li>
			<li><a href="{{ url('/') }}#contacto">Contacto</a></li>
		</ul>
	</section>
	<section>
		<i class="fas fa-phone"></i>
		<section>
			<h1>Contáctanos</h1>
			<a href="tel:6144153525">(614) 415 3525</a>
		</section>
	</section>
</nav>
@endsection

@section('content')
<!-- Error 403 -->
<section id="errors">
	<h1>No tienes autorización</h1>
</section>
@endsection

@section('js')
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
	AOS.init();
</script>
@endsection
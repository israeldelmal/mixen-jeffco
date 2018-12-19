@extends('web.master')

@section('meta')
<meta name="description" content="{{ $service->description }}">
<meta name="author" content="Mixen: Boosting Brands">
@endsection

@section('title')
JeffCo: Servicios | {{ $service->h1 }}
@endsection

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
			<li><a href="{{ url('/blog') }}">Blog</a></li>
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
<!-- Servicio -->
<section id="servicio">
	<header>
		<h1>JeffCo Soluciones de Optimización</h1>
		<sub>Servicios</sub>
		<section>
			@foreach($servicios as $servicio)
				<a href="{{ url('/servicios/' . $servicio->slug) }}" @if($servicio->id == $service->id) class="active-service" @endif>
					<img src="{{ asset('assets/images/servicios/iconos/' . $servicio->icon) }}" alt="{{ $servicio->h1 }}">
					<span>{{ $servicio->h1 }}</span>
				</a>
			@endforeach
		</section>
	</header>
	<section>
		<section>
			<h1>{{ $service->h1 }}</h1>
			{!! $service->content !!}
			<img src="{{ asset('assets/images/servicios/iconos/' . $service->icon) }}" alt="{{ $service->h1 }}">
		</section>
		<section style="background-image: url('{{ asset('assets/images/servicios/' . $service->image) }}')"></section>
	</section>
</section>
@endsection

@section('footer')
	@foreach($contacts as $contact)
		<!-- Pie -->
		<footer style="background-image: url('{{ asset('assets/images/pie/' . $contact->image) }}')">
			<section>
				<section>
					<h1>Contacto</h1>
					<ul>
						<li>Calle 2da | #1202 | Zona Centro</li>
						<li>Chihuahua, Chihuahua, México</li>
						<li><a href="tel:6144153525">(614) 4 15 35 25</a></li>
						<li><a href="{{ url('/iniciar-sesion') }}" target="_blank">Iniciar sesión</a></li>
					</ul>
				</section>
				<section>
					<img src="{{ asset('assets/images/isologo-blanco.png') }}" alt="Isologo | JeffCo">
				</section>
			</section>
			<footer>
				Derechos Reservados 2018 &reg; | <strong>Made by:</strong> <a href="http://mixen.mx/site" target="_blank"><img src="http://mixen.mx/firma/logo-new.png"></a>
			</footer>
		</footer>
	@endforeach
@endsection

@section('js')
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
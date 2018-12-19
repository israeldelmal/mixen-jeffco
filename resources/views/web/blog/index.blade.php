@extends('web.master')

@section('meta')
<meta name="description" content="Listado de artículos del blog">
<meta name="author" content="Mixen: Boosting Brands">
@endsection

@section('title', 'JeffCo: Blog')

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
<!-- Cabecera -->
<header id="inicio"@if(count($headers) == 0)style="background-image: url('{{ asset('assets/images/cabecera/fondo.jpg') }}')"@endif>
	@if(count($headers) > 0)
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				@foreach($headers as $header)
					<div class="item item-carousel-header" style="background-image: url('{{ asset('assets/images/cabeceras/' . $header->image) }}');">
						<div class="carousel-caption"></div>
					</div>
				@endforeach
			</div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<i class="fas fa-chevron-left"></i>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<i class="fas fa-chevron-right"></i>
		</a>
	@endif
</header>
<!-- Artículo -->
<main id="blog">
	<img src="{{ asset('assets/images/extras/circulo.svg') }}">
	<section>
		<span data-aos="fade-up" data-aos-duration="500">Blog</span>
		<h1 data-aos="fade-down" data-aos-duration="500">Obtén los mejores resultados con estos
		sencillos consejos y tendencias.</h1>
		<section>
			@foreach($articles as $article)
				<article data-aos="fade-down" data-aos-duration="500">
					<header style="background-image: url('{{ asset('assets/images/articulos/' . $article->image) }}')"></header>
					<section>
						<h1>{{ $article->title }}</h1>
						<ul>
							<li><i class="far fa-user"></i> {{ $article->user->name }} {{ $article->user->lastname }}</li>
							<li><i class="far fa-clock"></i> {{ $article->created_at->format('d | m | Y') }}</li>
						</ul>
						<p>{!! strip_tags(trim(substr($article->content, 0, 200))) !!}...</p>
						<a href="{{ url('/blog/' . $article->slug) }}">Ver más <i class="fas fa-arrow-right"></i></a>
					</section>
				</article>
			@endforeach
		</section>
		{{ $articles->links() }}
	</section>
</main>
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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
	AOS.init();
</script>
@endsection
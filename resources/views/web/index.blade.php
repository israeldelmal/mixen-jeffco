@extends('web.master')

@section('meta')
<meta name="description" content="#">
<meta name="keywords" content="#">
<meta name="author" content="Mixen: Boosting Brands">
@endsection

@section('title', 'JeffCo: Soluciones de Optimización')

@section('nav')
<!-- Navegación -->
<nav>
	<section>
		<a class="item-menu" href="#inicio">
			<img src="{{ asset('assets/images/isologo.png') }}" alt="Isologo JeffCo">
		</a>
	</section>
	<section>
		<ul>
			<li><a class="item-menu" href="#nosotros">Nosotros</a></li>
			<li><a class="item-menu" href="#servicios">Servicios</a></li>
			<li><a class="item-menu" href="#blog">Blog</a></li>
			<li><a class="item-menu" href="#contacto">Contacto</a></li>
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
<!-- Nosotros -->
<section id="nosotros">
	<img src="assets/images/extras/circulo.svg">
	@foreach($abouts as $about)
		<section>
			<span data-aos="fade-down" data-aos-duration="500">Nosotros</span>
			<h1 data-aos="fade-down" data-aos-duration="600">{{ $about->h1 }}</h1>
			<p data-aos="fade-down" data-aos-duration="700">{{ $about->content }}</p>
			<a class="item-menu" href="#contacto" data-aos="fade-down" data-aos-duration="800">Contáctanos</a>
		</section>
	@endforeach
</section>
<!-- Servicios -->
<section id="servicios">
	<h1 data-aos="fade-down" data-aos-duration="500">JeffCo Soluciones de Optimización</h1>
	<span data-aos="fade-down" data-aos-duration="700">Servicios</span>
	<section>
		@if(count($services) > 0)
			@foreach($services as $service)
				<section data-aos="fade-down" data-aos-duration="1000">
					<img src="{{ asset('assets/images/servicios/iconos/' . $service->icon) }}" alt="{{ $service->h1 }}">
					<h1>{{ $service->h1 }}</h1>
					<p>{{ $service->description }}</p>
					<a href="{{ url('/servicios/' . $service->slug) }}">Ver más</a>
				</section>
			@endforeach
		@else
			<h1 style="color: rgb(255, 255, 255); text-align: center; margin: auto; font-size: 2em; font-weight: 100; text-transform: uppercase;">Próximamente</h1>
		@endif
	</section>
</section>
<!-- Blog -->
<main id="blog">
	<img src="{{ asset('assets/images/extras/circulo.svg') }}">
	<section>
		<span data-aos="fade-up" data-aos-duration="500">Blog</span>
		<h1 data-aos="fade-down" data-aos-duration="500">Obtén los mejores resultados con estos
		sencillos consejos y tendencias.</h1>
		<section>
			@if(count($articles) > 0)
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
			@else
				<h1 style="color: rgb(0, 0, 0); text-align: center; margin: auto; font-size: 2em; font-weight: 100; text-transform: uppercase;">Próximamente</h1>
			@endif
		</section>
	</section>
</main>
<!-- Contacto -->
<section id="contacto">
	<span data-aos="fade-down" data-aos-duration="500">Contáctanos</span>
	<h1 data-aos="fade-up" data-aos-duration="500">Mandanos tus dudas ¡Nosotros te ayudamos!</h1>
	<form action="#" method="POST" data-aos="fade-up" data-aos-duration="500" id="FormContact">
		<div>
			<input type="text" name="name" id="name" autocomplete="off" placeholder="Nombre">
			<div id="error_name"></div>
		</div>
		<div>
			<input type="text" name="company" id="company" autocomplete="off" placeholder="Empresa">
			<div id="error_company"></div>
		</div>
		<div>
			<input type="email" name="email" id="email" autocomplete="off" placeholder="Correo Electrónico: ejemplo@ejemplo.com">
			<div id="error_email"></div>
		</div>
		<div>
			<input type="tel" name="tel" id="tel" autocomplete="off" placeholder="Teléfono">
			<div id="error_tel"></div>
		</div>
		<div>
			<input type="text" name="message" id="message" autocomplete="off" placeholder="Mensaje">
			<div id="error_message"></div>
		</div>
		<div>
			<button>Enviar</button>
		</div>
		<figure>
			<img src="{{ asset('assets/images/loader.svg') }}">
		</figure>
		{{ csrf_field() }}
	</form>
	<map>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.8518063681577!2d-106.0770554843966!3d28.634203282417232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea4352904af6eb%3A0x93c03b3e8fe05cf3!2sCalle+Segunda+1202%2C+Zona+Centro%2C+31000+Chihuahua%2C+Chih.!5e0!3m2!1ses-419!2smx!4v1532106202777" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
	</map>
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
					<img src="assets/images/isologo-blanco.png" alt="Isologo | JeffCo">
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

	$('#FormContact').on('submit', function(event) {
			event.preventDefault();
			let ID   = $(this).serialize();
			let Form = $(this);

			$.ajax({
				url: '{{ url("/contacto") }}',
				type: 'POST',
				dataType: 'json',
				data: ID,
				cache: false,
			})
			.done(function(data) {
				if (data.send == true) {
					alert('Gracias por escribirnos, nos ponemos en contacto a la brevedad.');
					$('.errors').fadeOut(300);
					$(Form).find('#name').val('');
					$(Form).find('#company').val('');
					$(Form).find('#email').val('');
					$(Form).find('#tel').val('');
					$(Form).find('#message').val('');
				} else if (data.fail == true) {
					$.each(data.errors, function(index, val) {
						$('#' + index).focusin(function() {
							$('#error_' + index).slideUp('normal');
						});
						$('#error_' + index).html(val).slideDown('normal');
					});
				}
			})
			.fail(function() {
				alert('¡Ocurrió un error inesperado, inténtalo más tarde!');
			})
			.always(function(data) {
				$(Form).find('figure').slideDown('normal', function() {
					if (data.send == true) {
						$(Form).find('figure').slideUp('normal');
					}

					if (data.fail == true) {
						$(Form).find('figure').slideUp('normal');
					}
				});
			});
		});
</script>
@endsection
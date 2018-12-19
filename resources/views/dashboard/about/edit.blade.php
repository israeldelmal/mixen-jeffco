@extends('dashboard.master')

@section('title', 'Actualizar Nosotros')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Actualizar Nosotros</span>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<form action="{{ url('/escritorio/nosotros/actualizar/' . $about->id) }}" method="POST">
					<section>
						<label for="h1">Título</label>
						<input type="text" name="h1" id="h1" value="{{ $about->h1 }}" autocomplete="off">
						@if ($errors->has('h1'))
							<div>{{ $errors->first('h1')}}</div>
						@endif
					</section>
					<section>
						<label for="content">Contenido</label>
						<textarea name="content" id="content">{{ $about->content }}</textarea>
						@if ($errors->has('content'))
							<div>{{ $errors->first('content')}}</div>
						@endif
					</section>
					<section>
						<button>
							Actualizar
						</button>
					</section>
					{{ csrf_field() }}
				</form>
			</main>
		</section>
	</section>
@endsection
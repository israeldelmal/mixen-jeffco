@extends('dashboard.master')

@section('title', 'Añadir imagen')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Añadir imagen</span>
				<a href="{{ url('/escritorio/cabecera') }}"><i class="fas fa-list-ul"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<form action="{{ url('/escritorio/cabecera/almacenar') }}" method="POST" enctype="multipart/form-data">
					<section>
						<label for="image">Imagen</label>
						<input type="file" name="image" id="image">
						@if ($errors->has('image'))
							<div>{{ $errors->first('image')}}</div>
						@endif
					</section>
					<section>
						<button>
							Añadir
						</button>
					</section>
					{{ csrf_field() }}
				</form>
			</main>
		</section>
	</section>
@endsection
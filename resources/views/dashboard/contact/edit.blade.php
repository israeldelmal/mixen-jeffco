@extends('dashboard.master')

@section('title', 'Actualizar Pie de página')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Actualizar pie de página</span>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<form action="{{ url('/escritorio/pie/actualizar/' . $contact->id) }}" method="POST" enctype="multipart/form-data">
					<section>
						<label for="image">Imagen</label>
						<input type="file" name="image" id="image">
						@if ($errors->has('image'))
							<div>{{ $errors->first('image')}}</div>
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
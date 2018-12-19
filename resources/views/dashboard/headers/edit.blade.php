@extends('dashboard.master')

@section('title', 'Actualizar imagen')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Actualizar imagen #{{ $header->id }}</span>
				<a href="{{ url('/escritorio/cabecera/crear') }}"><i class="fas fa-plus"></i></a>
				<a href="{{ url('/escritorio/cabecera') }}"><i class="fas fa-list-ul"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<form action="{{ url('/escritorio/cabecera/actualizar/' . $header->id) }}" method="POST" enctype="multipart/form-data">
					<section>
						<label for="image">Imagen</label>
						<input type="file" name="image" id="image">
						@if ($errors->has('image'))
							<div>{{ $errors->first('image')}}</div>
						@endif
					</section>
					<section>
						<label for="status">Estatus</label>
						<select name="status" id="status">
							<option value="0">Inactivo</option>
							<option value="1" @if($header->status == true) selected @endif>Activo</option>
						</select>
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
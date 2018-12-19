@extends('dashboard.master')

@section('title', 'Añadir servicio')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Añadir servicio</span>
				<a href="{{ url('/escritorio/servicios') }}"><i class="fas fa-list-ul"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<form action="{{ url('/escritorio/servicios/almacenar') }}" method="POST" enctype="multipart/form-data">
					<section>
						<label for="icon">Ícono</label>
						<input type="file" name="icon" id="icon">
						@if ($errors->has('icon'))
							<div>{{ $errors->first('icon')}}</div>
						@endif
					</section>
					<section>
						<label for="h1">Servicio</label>
						<input type="text" name="h1" id="h1" placeholder="Nombre del servicio" autocomplete value="{{ old('h1') }}">
						@if ($errors->has('h1'))
							<div>{{ $errors->first('h1')}}</div>
						@endif
					</section>
					<section>
						<label for="description">Descripción</label>
						<input type="text" name="description" id="description" placeholder="Descripción corta del servicio" autocomplete value="{{ old('description') }}">
						@if ($errors->has('description'))
							<div>{{ $errors->first('description')}}</div>
						@endif
					</section>
					<section>
						<label for="content">Contenido</label>
						<textarea name="content" id="formcontent">
							{{ old('content') }}
						</textarea>
						@if ($errors->has('content'))
							<div>{{ $errors->first('content')}}</div>
						@endif
					</section>
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

@section('js')
<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'formcontent' );
</script>
@endsection
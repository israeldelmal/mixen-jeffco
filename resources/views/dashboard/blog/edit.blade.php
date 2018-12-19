@extends('dashboard.master')

@section('title', 'Editar artículo')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Editar artículo</span>
				<a href="{{ url('/escritorio/blog') }}"><i class="fas fa-list-ul"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<form action="{{ url('/escritorio/blog/actualizar/' . $article->id) }}" method="POST" enctype="multipart/form-data">
					<section>
						<label for="title">Título</label>
						<input type="text" name="title" id="title" placeholder="Título del artículo" autocomplete="off" value="{{ $article->title }}">
						@if ($errors->has('title'))
							<div>{{ $errors->first('title')}}</div>
						@endif
					</section>
					<section>
						<label for="content">Contenido</label>
						<textarea name="content" id="formcontent">{{ $article->content }}</textarea>
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
						<label for="status">Estatus</label>
						<select name="status" id="status">
							<option value="0">Inactivo</option>
							<option value="1" @if($article->status == true) selected @endif>Activo</option>
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

@section('js')
<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'formcontent' );
</script>
@endsection
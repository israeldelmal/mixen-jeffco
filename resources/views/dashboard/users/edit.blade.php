@extends('dashboard.master')

@section('title', 'Editar Usuario')

@section('content')
<section id="content">
	<section>
		<h1>
			<span>Editar a {{ $user->name }} {{ $user->lastname }}</span>
			<a href="{{ url('/escritorio/usuarios') }}"><i class="fas fa-list-ul"></i></a>
			<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
		</h1>
		<main>
			<form action="{{ url('/escritorio/usuarios/actualizar/' . $user->id) }}" method="POST">
				<section>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="0">Inactivo</option>
						<option value="1" @if($user->status == true) selected @endif>Activo</option>
					</select>
					<div></div>
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
@extends('dashboard.master')

@section('title', 'Artículos')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Listado de artículos</span>
				<a href="{{ url('/escritorio/blog/crear') }}"><i class="fas fa-plus"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<table>
					<thead>
						<tr>
							<td>Título</td>
							<td>Autor</td>
							<td>Estatus</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						@if(count($articles) > 0)
							@foreach($articles as $article)
								<tr>
									<td>{{ $article->title }}</td>
									<td>{{ $article->user->name }} {{ $article->user->lastname }}</td>
									<td>
										@if($article->status == true)
											Activo
										@else
											Inactivo
										@endif
									</td>
									<td>
										<a href="{{ url('/escritorio/blog/editar/' . $article->id) }}">Editar</a>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td>No hay registros</td>
								<td>#</td>
								<td>#</td>
								<td>#</td>
							</tr>
						@endif
					</tbody>
				</table>
			</main>
			{{ $articles->links() }}
		</section>
	</section>
@endsection
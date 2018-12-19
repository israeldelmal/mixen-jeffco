@extends('dashboard.master')

@section('title', 'Cabecera')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Listado de imágenes</span>
				<a href="{{ url('/escritorio/cabecera/crear') }}"><i class="fas fa-plus"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<table>
					<thead>
						<tr>
							<td>#</td>
							<td>Autor</td>
							<td>Estatus</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						@if(count($headers) > 0)
							@foreach($headers as $header)
								<tr>
									<td>{{ $header->id }}</td>
									<td>{{ $header->user->name }} {{ $header->user->lastname }}</td>
									<td>
										@if($header->status == true)
											Activo
										@else
											Inactivo
										@endif
									</td>
									<td>
										<a href="{{ url('/escritorio/cabecera/editar/' . $header->id) }}">Editar</a>
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
			{{ $headers->links() }}
		</section>
	</section>
@endsection
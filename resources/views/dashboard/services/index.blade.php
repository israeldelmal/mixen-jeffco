@extends('dashboard.master')

@section('title', 'Servicios')

@section('content')
	<section id="content">
		<section>
			<h1>
				<span>Listado de servicios</span>
				<a href="{{ url('/escritorio/servicios/crear') }}"><i class="fas fa-plus"></i></a>
				<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
			</h1>
			<main>
				<table>
					<thead>
						<tr>
							<td>Servicio</td>
							<td>Autor</td>
							<td>Estatus</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						@if(count($services) > 0)
							@foreach($services as $service)
								<tr>
									<td>{{ $service->h1 }}</td>
									<td>{{ $service->user->name }} {{ $service->user->lastname }}</td>
									<td>
										@if($service->status == true)
											Activo
										@else
											Inactivo
										@endif
									</td>
									<td>
										<a href="{{ url('/escritorio/servicios/editar/' . $service->id) }}">Editar</a>
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
			{{ $services->links() }}
		</section>
	</section>
@endsection
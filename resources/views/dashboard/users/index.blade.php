@extends('dashboard.master')

@section('title', 'Listado de usuarios')

@section('content')
<section id="content">
	<section>
		<h1>
			<span>Listado de usuarios</span>
			<a href="{{ url('/escritorio') }}"><i class="fas fa-address-card"></i></a>
		</h1>
		<main>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>E-Mail</td>
						<td>Estatus</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->name }} {{ $user->lastname }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if($user->status == true)
									Activo
								@else
									Inactivo
								@endif
							</td>
							<td>
								<a href="{{ url('/escritorio/usuarios/editar/' . $user->id) }}">Editar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</main>
		{{ $users->links() }}
	</section>
</section>
@endsection
@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EUSE'){ $editar=true; }
	if ($func->code=='DUSE'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Usuarios</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table tablaNoOrder compact">
				<thead>
					<th>Usuario</th>
					<th>Correo</th>
					<th>Rol</th>
					<th>Nombre Completo</th>
					<th>CI</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Localidad</th>
					<th>Ciudad</th>
					<th>Oficina</th>
					<th>Editar</th>
					<th>Borrar</th>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role->name}}</td>
						<td>{{$user->people->nombre}}</td>
						<td>{{$user->people->ci}}</td>
						<td>{{$user->people->direccion}}</td>
						<td>{{$user->people->telefono}}</td>
						<td>{{$user->people->location->nombre}}</td>
						<td>{{$user->people->city->nombre}}</td>
						<td>{{$user->people->office->razon_social}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/user/'.$user->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/user/'.$user->id)}}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn-min danger" onclick="return confirm('Delete?');">Borrar</button>
							</form>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
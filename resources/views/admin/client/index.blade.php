@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ECLI'){ $editar=true; }
	if ($func->code=='DCLI'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Clientes - Solicitantes</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Nombre</th>
					<th>Nit</th>
					<th>Correo</th>
					<th>Dirección</th>
					<th>Categoría</th>
					<th class="centrado">Telefono</th>
					<th class="centrado">Telefono 2</th>
					<th class="centrado">Registrado</th>
					<th class="centrado">Ciudad</th>
					<th class="centrado">Localidad</th>
					<th class="centrado">Officina</th>
					<th class="centrado">Usuario</th>
					<th class="centrado">Coordenadas</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($clients as $client)
					<tr>
						<td>{{$client->nombre}}</td>
						<td>{{$client->nit}}</td>
						<td>{{$client->correo}}</td>
						<td>{{$client->direccion}}</td>
						<td>{{$client->categoria}}</td>
						<td class="centrado">{{$client->telefono}}</td>
						<td class="centrado">{{$client->telefono2}}</td>
						<td class="centrado">{{$client->fecha_registro}}</td>
						<td class="centrado">{{$client->city->nombre}}</td>
						<td class="centrado">{{$client->location->nombre}}</td>
						<td class="centrado">{{$client->office->nombre}}</td>
						<td class="centrado">{{$client->user->name}}</td>
						<td class="centrado">{{$client->coordenada}}</td>
						@if ($editar)
						<td class="centrado">
							<a class="btn primary" href="{{url('/admin/client/'.$client->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<form action="{{url('/admin/client/'.$client->id)}}" method="post">
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
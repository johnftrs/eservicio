@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ELOC'){ $editar=true; }
	if ($func->code=='DLOC'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Vehículos - Clientes</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Asegurado</th>
					<th>Tipo</th>
					<th>Placa</th>
					<th>Año</th>
					<th>Color</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Detalles</th>
					<th>Cliente</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($cars as $car)
					<tr>
						<td>{{$car->asegurado}}</td>
						<td>{{$car->tipo}}</td>
						<td>{{$car->placa}}</td>
						<td>{{$car->anyo}}</td>
						<td>{{$car->color}}</td>
						<td>{{$car->marca}}</td>
						<td>{{$car->modelo}}</td>
						<td>{{$car->detalles}}</td>
						<td>{{$car->client->nombre}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/car/'.$car->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/car/'.$car->id)}}" method="post">
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
{!!$cars->render()!!}
@endsection
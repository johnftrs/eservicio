@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EGRO'){ $editar=true; }
	if ($func->code=='DGRO'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Ciudades</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Nombre</th>
					<th>Productos</th>
					<th>Vendedor</th>
					<th>Telefono</th>
					<th>Telefono2</th>
					<th>Dirección</th>
					<th>Detalles</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($suppliers as $supplier)
					<tr>
						<td>{{$supplier->nombre}}</td>
						<td>{{$supplier->productos}}</td>
						<td>{{$supplier->vendedor}}</td>
						<td>{{$supplier->telefono}}</td>
						<td>{{$supplier->telefono2}}</td>
						<td>{{$supplier->direccion}}</td>
						<td>{{$supplier->detalles}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/supplier/'.$supplier->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/supplier/'.$supplier->id)}}" method="post">
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
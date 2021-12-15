@extends('layouts.admin')
@section('content')
@include('modal.files')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ELOT'){ $editar=true; }
	if ($func->code=='DLOT'){ $eliminar=true; }
}
?>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
				<span class="btn default reset_datatable">↺</span>
				<div class="btn nl info" onclick="seleccionar('table-responsive')">Seleccionar todo</div>
			</div>
			<div id="filtro">
				<input type="search" placeholder="Filtro:">
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover min">
				<thead>
					<th class="centrado">Item</th>
					<th class="centrado">Bs.Costo</th>
					<th class="centrado">%Gan</th>
					<th class="centrado">Bs.Venta</th>
					<th class="centrado">Cantidad</th>
					<th class="centrado">Stock</th>
					<th class="centrado">F.Ingreso</th>
					<th class="centrado">F.Producción</th>
					<th class="centrado">F.Vencimiento</th>
					<th class="centrado">Proveedor</th>
					<th class="centrado">Almacén</th>
					<th class="centrado">User</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
					
				</thead>
				<tbody>
					@foreach($lots as $lot)
					<tr>
						<td class="centrado">{{$lot->item->code}}</td>
						<td class="centrado">{{$lot->costo_unitario}}</td>
						<td class="centrado">{{$lot->porcentaje_incremento}}%</td>
						<td class="centrado">{{$lot->precio_venta}}</td>
						<td class="centrado">{{$lot->cantidad}}</td>
						<td class="centrado">{{$lot->stock}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($lot->fecha_ingreso)->format('d/m/Y')}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($lot->fecha_produccion)->format('d/m/Y')}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($lot->fecha_vencimiento)->format('d/m/Y')}}</td>
						<td class="centrado">{{$lot->supplier->nombre}}</td>
						<td class="centrado">{{$lot->store->nombre}}</td>
						<td class="centrado">{{$lot->user->name}}</td>
						@if ($editar)
						<td>
							<a class="btn primary centrado" href="{{url('/admin/lot/'.$lot->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/lot/'.$lot->id)}}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn-min danger centrado" onclick="return confirm('Delete?');">Borrar</button>
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
@extends('layouts.admin')
@section('content')
@include('modal.modal_pdf')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EORD'){ $editar=true; }
	if ($func->code=='DORD'){ $eliminar=true; }
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
			<table class="table table-hover">
				<thead>
					<th>Id</th>
					<th class="centrado">Fecha Cotización</th>
					<th>Nombre</th>
					<th>Total</th>
					<th class="centrado">Estado</th>
					<th class="centrado">Agente</th>
					<th class="centrado">PDF</th>
					<th class="centrado">Validar Pedido</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr class="{{$order->estado}}">
						<td>{{$order->id}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($order->fecha_pedido)->format('d/m/Y')}}</td>
						<td>{{$order->nombre_factura}}</td>
						<td>{{$order->total}}</td>
						<td class="centrado">{{$order->estado}}</td>
						<td class="centrado">{{$order->agent->name}}</td>
						<td class="centrado">
							<button type="button" class="btn warning" onclick="modal_pdf('http://{{ $_SERVER['HTTP_HOST'] }}/gr/public/admin/order/pdf/{{$order->id}}')">PDF</button>
							@if (Auth::user()->hasRole('ROOT'))
							<a href="http://{{ $_SERVER['HTTP_HOST']}}/gr/public/admin/order/pdf_prueba/{{$order->id}}" class="btn min success">ir</a>
							@endif
						</td>
						@if ($editar)
						<td class="centrado">
							@if ($order->estado=='COTIZACION')
							<a class="btn success" href="{{url('/admin/order/validar_pedido/'.$order->id)}}">Validar Pedido</a>
							@endif
						</td>
						@endif
						@if ($editar)
						<td class="centrado">
							<a class="btn primary" href="{{url('/admin/order/'.$order->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<form action="{{url('/admin/order/'.$order->id)}}" method="post">
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
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
					<th>Fecha Cot.</th>
					<th>Fec. Pedido</th>
					<th>Nombre</th>
					<th>Total</th>
					<th class="centrado">Estado</th>
					<th class="centrado">Agente</th>
					<th class="centrado">PDF Pedido</th>
					<th class="centrado">PDF Cobranza</th>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr class="{{$order->estado}}">
						<td>{{$order->id}}</td>
						<td>{{\Carbon\Carbon::parse($order->fecha_pedido)->format('d/m/Y')}}</td>
						<td>{{isset($order->fecha_entrega)?(\Carbon\Carbon::parse($order->fecha_entrega)->format('d/m/Y')):null}}</td>
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
							<a class="btn success" href="{{url('/admin/order/pedido/'.$order->id)}}">Validar Pedido</a>
							@endif
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
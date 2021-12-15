@extends('layouts.admin')
@section('content')
@include('alerts.pdf')
<script>
	document.title = "Ver Pagos";
</script>
<?php $eliminar=false; $editar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='DPAY'){ $eliminar=true; }
	if ($func->code=='EPAY'){ $editar=true; }
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
		<div class="contenedor-table-responsive">
			<div class="table-responsive cont_head_under">
				<table class="table table-order">
					<thead>
						<tr>
							<th class="centrado">Id</th>
							<th class="centrado">Ticket</th>
							<th class="centrado">Fecha Ticket</th>
							<th class="centrado">Hora</th>
							<th>Solicitante</th>
							<th>Subcliente</th>
							<th>Asegurado</th>
							<th class="centrado">Parte</th>
							<th>Abono</th>
							<th>Descuento</th>
							<th>Saldo</th>
							<th class="centrado">Estado</th>
							<th class="centrado">Factura</th>
							<th class="centrado">Observaciones</th>
							<th class="centrado">Usuario</th>
						</tr>
					</thead>
					<tbody>
						@foreach($payments as $key => $payment)
						<tr class="{{$payment->estado}}">
							<td class="centrado">{{$payment->id}}</td>
							<td class="centrado">{{$payment->service_id}}</td>
							<td class="centrado">{{\Carbon\Carbon::parse($payment->service->fecha_cita)->format('d-m-Y')}}</td>
							<td class="centrado">{{\Carbon\Carbon::parse($payment->service->fecha_cita)->format('H:i:s')}}</td>
							<td>{{$payment->service->solicitante->nombre}}</td>
							<td>{{$payment->service->subcliente->nombre ?? null}}</td>
							<td>{{$payment->service->car->asegurado}}</td>
							<td class="centrado"><b>{{$payment->parte}}</b></td>
							<td>Bs. {{$payment->abono}}</td>
							<td>Bs. {{$payment->descuento}}</td>
							<td>Bs. {{$payment->saldo}}</td>
							<td class="centrado"><b>{{$payment->estado}}</b></td>
							<td class="centrado">{{$payment->factura}}</td>
							<td class="centrado">{{$payment->observacion}}</td>
							<td class="centrado">{{$payment->user->name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
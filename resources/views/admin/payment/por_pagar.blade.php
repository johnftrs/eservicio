@extends('layouts.admin')
@section('content')
@include('alerts.pdf')
<script>
	document.title = "Por Pagar";
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
		<div class="contenedor-table-responsive cont_head_hover">
			<div class="table-head-responsive">
				<table>
					<thead>
						<tr>
							<th>Avl<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Fecha Cita<i class="mdi mdi-menu-swap"></i></th>
							<th>Cliente<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Estatus<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Costo<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Abono<i class="mdi mdi-menu-swap"></i></th>
							<th>Saldo<i class="mdi mdi-menu-swap"></i></th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-responsive cont_head_under">
				<table class="table">
					<thead>
						<tr>
							<th>Avl<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Fecha Cita<i class="mdi mdi-menu-swap"></i></th>
							<th>Cliente<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Estatus<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Costo<i class="mdi mdi-menu-swap"></i></th>
							<th class="centrado">Abono<i class="mdi mdi-menu-swap"></i></th>
							<th>Saldo<i class="mdi mdi-menu-swap"></i></th>
						</tr>
					</thead>
					<tbody>
						@foreach($avaluos as $key => $avaluo)
						<tr>
							<td>{{$avaluo->id}}</td>
							<td class="centrado">{{\Carbon\Carbon::parse($avaluo->fecha_cita)->format('d-m-Y')}}</td>
							<td>{{$avaluo->client_nombre()}}</td>
							<td class="centrado fs16">{!!($avaluo->abono==$avaluo->precio)?( ($avaluo->abono > 0)?'PAGADO':"sin monto" ):"<b>DEBE</b>"!!}</td>
							<td class="centrado">{{$avaluo->precio}}</td>
							<td class="centrado">{{$avaluo->abonos()}}</td>
							<td>{{$avaluo->precio - $avaluo->abono}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
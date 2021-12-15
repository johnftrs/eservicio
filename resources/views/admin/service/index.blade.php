@extends('layouts.admin')
@section('content')
@include('modal.files')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ESER'){ $editar=true; }
	if ($func->code=='DSER'){ $eliminar=true; }
}
?>
<script> document.title = "Tickets"; </script>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
				<div class="btn info" onclick="seleccionar('table-responsive')">Seleccionar</div>
			</div>
			<div class="flex">
				<span class="label"> De: </span><input type="text" class="form-control datepicker2 fecha1" value="{{Carbon\Carbon::parse($fecha)->format('Y-m-d')}}" autocomplete="off">
				<span class="label">A: </span><input type="text" class="form-control datepicker2 fecha2" value="{{Carbon\Carbon::parse($fecha2)->format('Y-m-d')}}" autocomplete="off">
				<a class="btn btn-min warning cambiar_fecha" href="{{ url($url) }}" style="line-height:30px;">Cambio</a>
				{{-- <a class="btn btn-min primary " href="{{ url("admin/excel-report-casas/$fecha/$fecha2") }}">Exportar a  Excel</a> --}}
			</div>
			<div class="flex" id="csrf">
				{{ csrf_field() }}
			</div>
			<!--div class="flex">
				<a class="btn  primary excel" href="#">Excel</a>
			</div-->
			<div id="filtro">
				<input type="search" placeholder="Filtro:">
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-order" id="tablatoexcel">
				<thead>
					<th>Ticket</th>
					<th class="centrado">Fecha</th>
					<th class="centrado">Hora</th>
					<th>Solicitante</th>
					<th>Subcliente</th>
					<th>Asegurado</th>
					<th>Num. Aseg.</th>
					<th>Marca Modelo</th>
					<th class="centrado">Servicio</th>
					<th>Responsable</th>
					<th>Equipo</th>
					<th>$Serv</th>
					<th>$Soli</th>
					<th>$Exc</th>
					<th>Dirección Solicitada</th>
					<th class="centrado">Estado</th>
					<th class="centrado">Información</th>
					<th class="centrado">Fotos</th>
					@if ($editar)<th class="centrado">Iniciar</th>@endif
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
					@if ($editar)<th class="centrado">Finalizar</th>@endif
				</thead>
				<tbody>
					@foreach($services as $service)
					<tr class="{{$service->estado}}">
						<td class="centrado">{{$service->id}}</td>
						<td class="centrado"><b>{{Carbon\Carbon::parse($service->fecha_cita)->format('d/m/Y')}}</b></td>
						<td class="centrado"><b>{{Carbon\Carbon::parse($service->fecha_cita)->format('H:i')}}</b></td>
						<td>{{$service->solicitante->nombre}}</td>
						<td class="direccion-100">{{$service->subcliente->nombre ?? null}}</td>
						<td>{{$service->car->asegurado ?? null}}</td>
						<td><b>{{$service->car->detalles ?? null}}</b></td>
						<td class="direccion-100">{{$service->car->marca ?? null}} {{$service->car->modelo ?? null}} {{$service->car->color ?? null}} {{$service->car->placa ?? null}}</td>
						<td>{{$service->price->type->nombre}}</td>
						<td>{{$service->chofer->name}}</td>
						<td>{{$service->crane->codigo}} - {{$service->crane->modelo}}</td>
						<td>Bs. {{$service->precio_total}}</td>
						<td>Bs. {{$service->precio_solicitante}}</td>
						<td>Bs. {{$service->precio_excedente}}</td>
						<td class="direccion">{{$service->direccion_solicitada}} - <b>{{$service->detalles}}</b></td>
						<td><b>{{$service->estado}}</b></td>
						<td class="centrado">
							<a class="btn info" href="{{url('/admin/service/info/'.$service->id)}}">Info</a>
						</td>
						<td class="centrado">
							<button type="button" class="subir btn default" service_id="{{$service->id}}">Fotos</button>
						</td>
						@if ($editar)
						<td>
							<a target="_blank" class="btn success" href="{{url('/admin/service/ficha/'.$service->id)}}">Ficha</a>
						</td>
						@endif
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/service/'.$service->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/service/'.$service->id)}}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn-min danger" onclick="return confirm('Delete?');">Borrar</button>
							</form>
						</td>
						@endif
						<td>
							@if ($editar && $service->estado != "FINALIZADO")
							<a class="btn danger" href="{{url('/admin/service/finalizar/'.$service->id)}}">Finalizar</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
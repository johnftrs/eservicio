@extends('layouts.admin')
@section('content')
@include('alerts.request')
<script> document.title = "Ficha"; </script>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
				<div class="btn info" onclick="seleccionar('table-responsive')">Seleccionar todo</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table min">
				<tbody>
					<tr><td>*<b>Servicio:</b>* &nbsp  &nbsp </td><td>{{$service->price->type->nombre}}</td></tr>
					<tr><td>*<b>Responsable:</b>*</td><td>{{$service->chofer->name}} - {{$service->crane->codigo}} - {{$service->crane->modelo}}</td></tr>
					<tr><td>*<b>Fecha y Hora:</b>*</td><td><b>{{Carbon\Carbon::parse($service->fecha_cita)->format('H:i')}}</b> &nbsp {{Carbon\Carbon::parse($service->fecha_cita)->format('d/m/Y')}}</td></tr>
					<tr><td>*<b>Asegurado:</b>*</td><td>{{$service->car->asegurado}}</td></tr>
					<tr><td>*<b>Teléfono:</b>*</td><td>{{$service->car->detalles}}</td></tr>
					<tr><td>*<b>Vehículo:</b>*</td><td>{{$service->car->marca}} - {{$service->car->modelo}} - {{$service->car->color}} - {{$service->car->placa}}</td></tr>
					<tr><td>*<b>Dirección:</b>*</td><td>{{$service->direccion_solicitada}}</td></tr>
					@if ($service->direccion_destino!="" && $service->direccion_destino!=null)
					<tr><td>*<b>Destino:</b>* &nbsp </td><td>{{$service->direccion_destino}}</td></tr>
					@endif
					<tr><td>*<b>Detalles:</b>* &nbsp  &nbsp </td><td>{{$service->detalles}}</td></tr>
					<tr><td>*<b>Ubicación:</b>*</td><td>
						@if (isset($service->coordenada_solicitada))
						@if (str_replace(' ', '', $service->coordenada_solicitada[0]) != "h")
						https://maps.google.com/?q={{str_replace(' ', '', $service->coordenada_solicitada)}}
						@else
						{{str_replace(' ', '', $service->coordenada_solicitada)}}
						@endif
						@endif
					</td></tr>
					@if ($service->coordenada_destino!="" && $service->coordenada_destino!=null)
					<tr><td>*<b>Destino:</b>* &nbsp </td><td>https://maps.google.com/?q={{str_replace(' ', '', $service->coordenada_destino)}}</td></tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
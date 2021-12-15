@extends('layouts.admin')
@section('content')
@include('alerts.request')
<script> document.title = "Información Ficha: "+{{$service->id}}; </script>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
				<div class="f24" style="margin-top:10px;">Ticket: {{$service->id}} - {{$service->price->type->nombre}}</div>
			</div>
			<div class="flex ">
				<div class="btn info" onclick="seleccionar('table-responsive')">Seleccionar todo</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table min">
				<thead>
					<tr>
						<th colspan="4">Datos del Ticket</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Servicio:</b></td><td>{{$service->price->type->nombre}}</td>
						<td><b>Responsable:</b></td><td>{{$service->chofer->name ?? null}} - {{$service->crane->codigo ?? null}} - {{$service->crane->modelo ?? null}}</td>
					</tr>
					<tr>
						<td><b>Solicitante:</b></td><td>{{$service->solicitante->nombre}}</td>
						<td class="green-soft"><b>Subcliente:</b></td><td class="green-soft">{{$service->subcliente->nombre ?? null}}</td>
					</tr>
					<tr>
						<td><b>Fecha Cita:</b></td><td>[{{Carbon\Carbon::parse($service->fecha_cita)->format('H:i')}}] - {{Carbon\Carbon::parse($service->fecha_cita)->format('d/m/Y')}}</td>
						<td><b>Fecha Registro:</b></td><td>{{Carbon\Carbon::parse($service->created_at)->format('H:i')}} - {{Carbon\Carbon::parse($service->created_at)->format('d/m/Y')}}</td>
					</tr>
					<tr>
						<td><b>Inicio Servicio:</b></td><td>
							@if ($service->estado == "EN PROCESO" || $service->estado == "FINALIZADO")
							[{{Carbon\Carbon::parse($service->fecha_inicio)->format('H:i')}}] - {{Carbon\Carbon::parse($service->fecha_inicio)->format('d/m/Y')}}
							@endif
						</td>
						<td><b>Última Modificación:</b></td><td>{{Carbon\Carbon::parse($service->updated_at)->format('H:i')}} - {{Carbon\Carbon::parse($service->updated_at)->format('d/m/Y')}}</td>
					</tr>
					<tr>
						<td class="red-soft"><b>Fin Servicio:</b></td><td class="red-soft">
							@if ($service->estado == "FINALIZADO")
							[{{Carbon\Carbon::parse($service->fecha_fin)->format('H:i')}}] - {{Carbon\Carbon::parse($service->fecha_fin)->format('d/m/Y')}}
							@endif
						</td>
						<td><b>Estado Ticket:</b></td><td class="{{$service->estado}}">{{$service->estado}}</td>
					</tr>
					<tr>
						<td class="red-soft"><b>Duración Servicio:</b></td><td class="red-soft">
							<?php 
							$fecha_inicio = Carbon\Carbon::parse($service->fecha_inicio);
							$fecha_fin = Carbon\Carbon::parse($service->fecha_fin);
							?>
							Días: {{$fecha_inicio->diffInDays($fecha_fin)}} &nbsp Horas: {{$fecha_inicio->diffInHours($fecha_fin)%24}} &nbsp Minutos: {{$fecha_inicio->diffInMinutes($fecha_fin)%60}}
						</td>
						<td></td><td></td>
					</tr>
					<tr>
						<td><b>Asegurado:</b></td><td>{{$service->car->asegurado}} - {{$service->car->detalles}}</td>
						<td><b>Localidad:</b></td><td>{{$service->location->nombre}}</td>
					</tr>
					<tr>
						<td><b>Vehículo:</b></td><td>{{$service->car->tipo ?? null}} - {{$service->car->marca ?? null}} - {{$service->car->modelo ?? null}} - {{$service->car->anyo ?? null}} - {{$service->car->color ?? null}} - {{$service->car->placa ?? null}}</td>
						<td><b>Dirección Solicitada:</b></td><td>{{$service->direccion_solicitada}}</td>
					</tr>
					<tr>
						<td><b>Detalles:</b></td><td>{{$service->detalles}}</td>
						<td class="blue"><b>Dirección Destino:</b></td><td class="blue">{{$service->direccion_destino}}</td>
					</tr>
					<tr>
						<td><b>Precio Servicio:</b></td><td>{{$service->precio_total}} Bs.</td>
						<td><b>Ubicación Solicitada:</b></td>
						<td>
							@if (substr($service->coordenada_solicitada, 0, 1) != "h")
							https://maps.google.com/?q={{str_replace(' ', '', $service->coordenada_solicitada)}}
							@else
							{{str_replace(' ', '', $service->coordenada_solicitada)}}
							@endif
						</td>
					</tr>
					<tr>
						<td><b>Precio Solicitante:</b></td><td>{{$service->precio_solicitante}} Bs.</td>
						<td><b>Ubicación Destino:</b></td>
						<td>
							@if (substr($service->coordenada_destino, 0, 1) != "h")
							https://maps.google.com/?q={{str_replace(' ', '', $service->coordenada_destino)}}
							@else
							{{str_replace(' ', '', $service->coordenada_destino)}}
							@endif
						</td>
					</tr>
					<tr>
						<td><b>Precio Excedente:</b></td><td>{{$service->precio_excedente}} Bs.</td>
						<td><b>Usuario Registró:</b></td><td>{{$service->user->name}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table min">
				<thead>
					<tr>
						<th colspan="10">Registro de Pagos</th>
					</tr>
				</thead>
				<thead>
					<tr>
						<th class="centrado">Id</th>
						<th class="centrado">Registro</th>
						<th class="centrado">Fecha Pago</th>
						<th class="centrado">Estado</th>
						<th>Abono</th>
						<th>Descuento</th>
						<th>Saldo</th>
						<th class="centrado">Parte</th>
						<th class="centrado">Factura</th>
						<th class="centrado">Usuario</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($service->payments as $payment)
					<tr class="{{$payment->estado=='DEBE'?'red-soft':''}}">
						<td class="centrado">{{$payment->id}}</td>
						<td class="centrado">{{isset($payment->fecha_registro)?\Carbon\Carbon::parse($payment->fecha_registro)->format('H:i d/m/Y'):null}}</td>
						<td class="centrado">{{isset($payment->fecha_pago)?\Carbon\Carbon::parse($payment->fecha_pago)->format('H:i d/m/Y'):null}}</td>
						<td class="centrado"><b>{{$payment->estado}}</b></td>
						<td>{{isset($payment->abono)?"Bs.":""}} {{$payment->abono}}</td>
						<td>{{isset($payment->descuento)?"Bs.":""}} {{$payment->descuento}}</td>
						<td><b>{{isset($payment->saldo)?"Bs.":""}} {{$payment->saldo}}</b></td>
						<td class="centrado">{{$payment->parte}}</td>
						<td class="centrado">{{$payment->factura}}</td>
						<td class="centrado">{{$payment->user->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table min"><thead><tr><th class="centrado">RECOJO</th></tr></thead></table>
			@foreach ($service->files->where('categoria','RECOJO') as $file)
			<table class="table min"><thead><tr><th>[{{$file->descripcion}}]</th></tr></thead></table>
			<div class="cont_info_image">
				@foreach ($file->directories as $directory)
				<img class="info_imagen" src="{!!URL::to(str_replace("MIN-","",$directory->path))!!}">
				@endforeach
			</div>
			@endforeach
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table min"><thead><tr><th class="centrado">ENTREGA</th></tr></thead></table>
			@foreach ($service->files->where('categoria','ENTREGA') as $file)
			<table class="table min"><thead><tr><th>[{{$file->descripcion}}]</th></tr></thead></table>
			<div class="cont_info_image">
				@foreach ($file->directories as $directory)
				<img class="info_imagen" src="{!!URL::to(str_replace("MIN-","",$directory->path))!!}">
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
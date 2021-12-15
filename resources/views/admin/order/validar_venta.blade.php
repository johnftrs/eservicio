@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="card">
	<div class="card-header primary-low">
		@if (isset($order))
		<h5 class="card-title"><div>VALIDAR VENTA : {{$order->nombre_factura}}</div><div>PEDIDO: #{{$order->id}}</div></h5>
		@else
		<h5 class="card-title">Registro de Lote</h5>
		@endif
	</div>
	<div class="card-body">
		<form action="{{url('/admin/order/post/validar_venta')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			
			<div class="col-4">
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Nombre Razón Social') !!}:<div>{!! Form::label($order->client->nombre) !!}</div>
					</div>
				</div>
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Nit') !!}:<div>{!! Form::label($order->nit_factura) !!}</div>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						{!! Form::label('Dirección de Envío') !!}
						{!! Form::text('direccion',$order->direccion_envio ?? null,['class'=>'form-control upper direccion', 'maxlength'=>255]) !!}
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Telefono') !!}:<div>{!! Form::label($order->client->telefono) !!}</div>
					</div>
				</div>
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Telefono 2') !!}:<div>{!! Form::label($order->client->telefono2) !!}</div>
					</div>
				</div>
				<div class="col-1">
					<div class="form-group">

					</div>
				</div>
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Agente de Ventas') !!}:<div class="orange">{!! Form::label($order->agent->name) !!}</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Ciudad') !!}:
						{!! Form::select('city_id', $cities, $order->city_id ?? Auth::id(), ['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Localidad') !!}:
						{!! Form::select('location_id', $locations, $order->location_id ?? Auth::id(), ['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="col-1">
					<div class="form-group">
						{!! Form::label('Oficina') !!}:
						{!! Form::select('office_id', $offices, $order->office_id ?? Auth::id(), ['class'=>'form-control']) !!}
					</div>
				</div>
			</div>
			<div class="cont_pedido">
				<table class="table min">
					<thead>
						<th class="centrado">Nº</th>
						<th class="centrado">Item</th>
						<th class="centrado">Stock</th>
						<th class="centrado">Precio</th>
						<th class="centrado">Cantidad</th>
						<th class="centrado">-%</th>
						<th class="centrado">-</th>
						<th class="centrado">Precio Venta</th>
					</thead>
					<?php
					$p=0;
					?>
					@if (isset($order->id))
					<input type="hidden" name="id" value="{{$order->id}}">
					@foreach ($order->buy_lists as $buylist)
					<tbody>
						<tr class="tr_list" id='klon{{++$p}}'>
							<td class="centrado b">{{$p}}</td>
							<td class="centrado">
								<div class="text-select">
									{!! Form::label($buylist->lot->item->code) !!}
								</div>
							</td>
							<td class="centrado"><div class="stock">{{$buylist->lot->stock}}</div></td>
							<td class="centrado"><div class="precio">{{$buylist->lot->precio_venta}}</div></td>
							<td class="centrado">{!! Form::label($buylist->cantidad) !!}</td>
							<td class="centrado">{!! Form::label($buylist->descuento) !!}</td>
							<td class="centrado"><div class="precio_venta_d">{{ ($buylist->descuento>0) ? number_format($buylist->lot->precio_venta*$buylist->cantidad,2,'.',',') : ''}}</div></td>
							<td class="centrado"><div class="precio_venta">{{$buylist->precio_venta}}</div></td>
						</tr>
					</tbody>
					@endforeach
					@endif

					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="centrado"><b>Subtotal:</b></td>
							<td></td>
							<td></td>
							<td class="centrado">{{$order->subtotal ?? null}}</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="centrado green"><b>TOTAL:</b></td>
							<td class="centrado">{!! Form::label($order->descuento) !!}</td>
							<td></td>
							<td class="centrado"><div class="total">{{$order->total ?? null}}</div></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>

			<div class="col-2 nb">
				{!! Form::submit('Guardar',['class'=>'btn primary col-4']) !!}
			</div>
		</form>
	</div>
</div>
@endsection
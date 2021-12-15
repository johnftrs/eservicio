<div class="col-4">
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Nombre Razón Social') !!}
			<div class="text-select">
				{!! Form::text('nombre_factura',$order->nombre_factura ?? null,['class'=>'form-control buscador autocompletar upper','required', 'maxlength'=>255,'autocomplete'=>'off']) !!}
				<div>
					<ul>
						@foreach ($clients as $client)
						<li class="li_select" client_id_sol="{{$client->id}}" nit_factura="{{$client->nit}}" direccion="{{$client->direccion}}" telefono="{{$client->telefono}}" telefono2="{{$client->telefono2}}"><a>{{$client->nombre}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Nit') !!}
			{!! Form::text('nit_factura',$order->nit_factura ?? null,['class'=>'form-control upper nit_factura','maxlength'=>255,'autocomplete'=>'off']) !!}
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
			{!! Form::label('Telefono') !!}
			{!! Form::text('telefono',$order->client->telefono ?? null,['class'=>'form-control telefono', 'maxlength'=>255,'autocomplete'=>'off']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Telefono 2') !!}
			{!! Form::text('telefono2',$order->client->telefono2 ?? null,['class'=>'form-control telefono2', 'maxlength'=>255,'autocomplete'=>'off']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">

		</div>
	</div>
	<div class="col-1 orange">
		<div class="form-group">
			{!! Form::label('Agente de Ventas') !!}
			{!! Form::select('agent_id', $agents, $order->agent_id ?? Auth::id(), ['class'=>'form-control']) !!}
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
		@foreach ($order->buy_lists as $buylist)
		<tbody>
			<tr class="tr_list" id='klon{{++$p}}'>
				<td class="centrado b">{{$p}}</td>
				<td class="centrado">
					<input type="hidden" name="lot_id[]" class="lot_id" value="{{$buylist->lot_id}}">
					<div class="text-select">
						{!! Form::text('item_nombre[]',$buylist->lot->item->code ?? null,['class'=>'buscador autocompletar upper item_nombre','maxlength'=>255,'autocomplete'=>'off']) !!}
						<div>
							<ul>
								@foreach ($lots as $lot)
								<li class="li_item block" lot_id="{{$lot->id}}" code="{{$lot->item->code}}" stock='{{$lot->item->stock()}}' precio='{{$lot->item->precio()}}'><a class="izquierda">[{{$lot->item->code}}] {{$lot->item->nombre}} STK:{{$lot->item->stock()}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</td>
				<td class="centrado"><div class="stock">{{$buylist->lot->stock}}</div></td>
				<td class="centrado"><div class="precio">{{$buylist->lot->precio_venta}}</div></td>
				<td class="centrado"><input type="text" class="cantidad" name="cantidad[]" value="{{$buylist->cantidad}}" onkeypress='return justNumbers(event);' autocomplete='off'></td>
				<td class="centrado"><input type="text" class="descuento" name="descuento[]" value="{{$buylist->descuento}}" onkeypress='return justNumbers(event);' autocomplete='off'></td>
				<td class="centrado"><div class="precio_venta_d">{{ ($buylist->descuento>0) ? number_format($buylist->lot->precio_venta*$buylist->cantidad,2,'.',',') : ''}}</div></td>
				<td class="centrado"><div class="precio_venta">{{$buylist->precio_venta}}</div><input type="hidden" class="i_precio_venta" name="i_precio_venta[]" value="{{$buylist->precio_venta}}"></td>
			</tr>
		</tbody>
		@endforeach
		@endif
		<tbody>
			<tr class="tr_list" id='klon{{++$p}}'>
				<td class="centrado b">{{$p}}</td>
				<td class="centrado">
					<input type="text" name="lot_id[]" class="lot_id" hidden value="">
					<div class="text-select">
						{!! Form::text('item_nombre[]',null,['class'=>'buscador autocompletar upper item_nombre','maxlength'=>255,'autocomplete'=>'off']) !!}
						<div>
							<ul>
								@foreach ($lots as $lot)
								<li class="li_item block" lot_id="{{$lot->id}}" code="{{$lot->item->code}}" stock='{{$lot->item->stock()}}' precio='{{$lot->item->precio()}}'><a class="izquierda">[{{$lot->item->code}}] {{$lot->item->nombre}} STK:{{$lot->item->stock()}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</td>
				<td class="centrado"><div class="stock"></div></td>
				<td class="centrado"><div class="precio"></div></td>
				<td class="centrado"><input type="text" class="cantidad" name="cantidad[]" onkeypress='return justNumbers(event);' autocomplete='off'></td>
				<td class="centrado"><input type="text" class="descuento" name="descuento[]" onkeypress='return justNumbers(event);' autocomplete='off'></td>
				<td class="centrado"><div class="precio_venta_d"></div></td>
				<td class="centrado"><div class="precio_venta"></div><input type="hidden" class="i_precio_venta" name="i_precio_venta[]"></td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="centrado"><b>Subtotal:</b></td>
				<td></td>
				<td></td>
				<td class="centrado"><div class="total_d">{{$order->subtotal ?? null}}</div><input type="hidden" class="subtotal" name="subtotal" value="{{$order->subtotal ?? null}}"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="centrado green"><b>TOTAL:</b></td>
				<td class="centrado"><input type="text" class="t_descuento" name="t_descuento" onkeypress='return justNumbers(event);' autocomplete="off" value="{{$order->descuento ?? null}}"></td>
				<td></td>
				<td class="centrado"><div class="total">{{$order->total ?? null}}</div><input type="hidden" class="itotal" name="total" value="{{$order->total ?? null}}"></td>
			</tr>
		</tbody>
	</table>
</div>
<br>
{!! Html::style('css/pdf_pedido.css') !!}
<?php
$pag=0;
$n = 0;
$count = count($order->buy_lists);
$paginas=intval( 1+($count/30) );
?>
{{-- PAGINA 1 --}}
<div class="page">
	<div class="contenido">
		<div class="flotantes">
			<div class="pagina">
				Pág. {{++$pag}} de {{$paginas}}
			</div>
			<img class="marcadeagua" src="{!!URL::to('icons/Logo GyR Bottom.png')!!}">
		</div>
		<div class="membretado">
			<img src="{!!URL::to('icons/Logo GyR.png')!!}">
			<span class="fs-16"><b>Distribuidora G y R</b></span>
			<br>
			<span>Urb. Las Palmas #23 mzo. Ñ</span>
			<br>
			<span>Cel.: 73905741</span>
			<br>
			<span><u>TRINIDAD - BOLIVIA</u></span>
		</div>
		<div class="centrado fs-16 bb"><b>{{$order->estado=='COTIZACION'?'COTIZACIÓN':'ORDEN DE PEDIDO'}} # {{$order->id}}</b></div>
		<table class="tabla0">
			<tbody>
				<tr>
					<td class="bold client">Cliente:</td>
					<td class="nomb">{{$order->nombre_factura}}</td>
					<td class="bold client">Fecha:</td>
					<td>{{isset($order->fecha_pedido)?(\Carbon\Carbon::parse($order->fecha_pedido)->format('d/m/Y')):(\Carbon\Carbon::parse($order->fecha_registro)->format('d/m/Y'))}}</td>
				</tr>
				<tr>
					<td class="bold client">Ciudad:</td>
					<td class="nomb">{{$order->location->nombre}} - {{$order->city->nombre}}</td>
					<td class="bold client">NIT:</td>
					<td>{{$order->nit_factura}}</td>
				</tr>
				<tr>
					<td class="bold client">Dirección:</td>
					<td class="nomb">{{$order->direccion_envio}}</td>
					<td class="bold client">Teléfono:</td>
					<td>{{$order->telefono}}</td>
				</tr>
			</tbody>
		</table>
		<table class="tabla2 bb">
			<thead>
				<tr>
					<th class="derecha n">#</th>
					<th class="centrado cant">Can</th>
					<th class="centrado codigo">Código</th>
					<th class="detalle izquierda">Detalle</th>
					<th class="derecha">P. Unit.</th>
					<th class="centrado uu">U.</th>
					<th class="derecha sub">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($order->buy_lists as $buylist)
				<tr>
					<td class="derecha n">{{++$n}}</td>
					<td class="centrado cant">{{$buylist->cantidad}}</td>
					<td class="izquierda codigo">{{$buylist->lot->item->code}}</td>
					<td class="izquierda detalle">{{$buylist->lot->item->nombre}}</td>
					<td class="derecha">{{$buylist->lot->precio_venta}}</td>
					<td class="centrado uu">Bs.</td>
					<td class="derecha sub">{{$buylist->precio_venta}}</td>
				</tr>
				@endforeach
				@for ($i = 0; $i < (30-$count); $i++)
				<tr>
					<td class="derecha n">{{++$n}}</td>
					<td class="centrado cant"></td>
					<td class="centrado codigo"></td>
					<td class="centrado detalle"></td>
					<td></td>
					<td class="uu"></td>
					<td class="sub"></td>
				</tr>
				@endfor
			</tbody>
			<thead>
				<tr>
					<td class="n"></td>
					<td class="centrado cant"></td>
					<td class="centrado codigo"></td>
					<td class="izquierda detalle"></td>
					<td class="derecha">Subtotal:</td>
					<td class="centrado uu">Bs.</td>
					<td class="derecha sub">{{$order->subtotal ?? null}}</td>
				</tr>
				<tr>
					<td class="n"></td>
					<td class="centrado cant"></td>
					<td class="centrado codigo"></td>
					<td class="izquierda detalle"></td>
					<td class="derecha">Descuento:</td>
					<td class="centrado uu">%</td>
					<td class="derecha sub">{{$order->descuento ?? 0}}</td>
				</tr>
				<tr>
					<th class="n"></th>
					<th class="centrado cant"></th>
					<th class="centrado codigo"></th>
					<th class="izquierda detalle"></th>
					<th class="derecha">Total:</th>
					<td class="centrado uu"><b>Bs.</b></td>
					<th class="derecha sub">{{$order->total ?? null}}</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@for ($i = 0; $i < $paginas-1; $i++)
<div class="page-break"></div>
@endfor
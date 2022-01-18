<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link type="text/css" href="{{public_path('css/pdf_arqueo.css')}}" rel="stylesheet" />
	<link type="text/css" href="{{--url('css/pdf_arqueo.css')--}}" rel="stylesheet" />
	<title>Arqueo</title>
</head>
<?php
$pag=0;
$paginas=1;
?>
<body>
	<div class="page">
		<div class="contenido">
			<div class="flotantes">
				<div class="pagina">
					Pág. {{++$pag}} de {{$paginas}}
				</div>
				<div class="impresion">
					Usuario Impresión: {{\Auth::user()->name}}
					<br>
					Fecha Impresión: {{\Carbon\Carbon::now()->format('d/m/y H:i')}}
				</div>
				<img class="marcadeagua" src="">
			</div>
			<div class="membretado">
				<img src="">
				<span class="fs-16"><b>{{\Auth::user()->people->office->nombre}}</b></span>
				<br>
				<span>{{\Auth::user()->people->office->direccion}}</span>
				<br>
				<span>{{\Auth::user()->people->office->telefono}}</span>
				<br>
				<span><u>{{\Auth::user()->people->office->ciudad}}</u></span>
			</div>
			<div class="centrado fs-16 bb"><b>REOPORTE ARQUEO</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Fecha:</td>
						<td class="nomb">{{$date}}</td>
						<td class="bold">Turno:</td>
						<td>{{$turno}}</td>
					</tr>
				</tbody>
			</table>
			<table class="bb">
				<thead>
					<tr>
						<th class="izquierda dispenser">Dispenser</th>
						<th class="izquierda meter">Meter Ini.</th>
						<th class="izquierda meter">Meter Fin.</th>
						<th class="centrado cantidad">Cantidad</th>
						<th class="centrado precio">Precio</th>
						<th class="derecha total_bs">Bs.</th>
					</tr>
				</thead>
				<tbody>
					<?php $suma_ingresos = 0; ?>
					@foreach ($dispensers as $dis)
					<?php
					$cantidad = ( $accountings->where('dispenser_id',$dis->id)->first() ? $accountings->where('dispenser_id',$dis->id)->sum('cantidad') : 0 );
					$bs = $cantidad*$dis->fuel->precio_venta; ?>
					<tr>
						<td class="izquierda">{{$dis->nombre}}</td>
						<td class="izquierda">{{number_format($accountings->where('dispenser_id',$dis->id)->first() ? $accountings->where('dispenser_id',$dis->id)->first()->meter_inicial : 0, 2, ',', '.')}}</td>
						<td class="izquierda">{{number_format($accountings->where('dispenser_id',$dis->id)->first() ? $accountings->where('dispenser_id',$dis->id)->first()->meter_final : 0, 2, ',', '.')}}</td>
						<td class="centrado">{{number_format($accountings->where('dispenser_id',$dis->id)->first() ? $accountings->where('dispenser_id',$dis->id)->sum('cantidad') : 0, 2, ',', '.')}}</td>
						<td class="centrado">{{$dis->fuel->precio_venta}}</td>
						<td class="derecha">{{number_format($bs, 2, ',', '.')}}</td>
					</tr>
					<?php $suma_ingresos += $bs; ?>
					@endforeach
					<tr>
						<td class="izquierda "></td>
						<td class="izquierda "></td>
						<td class="izquierda "></td>
						<td class="centrado"></td>
						<td class="derecha bt"><b>Sub Total</b></td>
						<td class="derecha bt"><b>{{number_format($suma_ingresos, 2, ',', '.')}}</b></td>
					</tr>
				</tbody>
			</table>
			<table class="bb">
				<thead>
					<tr>
						<th class="izquierda dispenser">Vales</th>
						<th class="izquierda meter"></th>
						<th class="izquierda meter"></th>
						<th class="centrado cantidad">Codigo</th>
						<th class="centrado precio">Serie</th>
						<th class="derecha total_bs">Bs.</th>
					</tr>
				</thead>
				<tbody>
					<?php $suma_tickets = 0; ?>
					@foreach ($tickets as $ticket)
					<?php  ?>
					<tr>
						<td class="izquierda"></td>
						<td class="izquierda"></td>
						<td class="izquierda"></td>
						<td class="centrado">{{$ticket->codigo}}</td>
						<td class="centrado">{{$ticket->serie}}</td>
						<td class="derecha">{{number_format($ticket->monto, 2, ',', '.')}}</td>
					</tr>
					<?php $suma_tickets += $ticket->monto; ?>
					@endforeach
					<tr>
						<td class="izquierda "></td>
						<td class="izquierda "></td>
						<td class="izquierda "></td>
						<td class="centrado"></td>
						<td class="derecha bt"><b>Sub Total</b></td>
						<td class="derecha bt"><b>{{number_format($suma_tickets, 2, ',', '.')}}</b></td>
					</tr>
				</tbody>
			</table>
			<table class="bb efectivo">
				<thead>
					<tr>
						<th class="derecha dispenser">Efectivo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bs. 200</th>
						<th class="derecha meter">Bs. 100</th>
						<th class="derecha meter">Bs. 50</th>
						<th class="derecha cantidad">Bs. 20</th>
						<th class="derecha precio">Bs. 10</th>
						<th class="derecha total_bs">Monedas</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="derecha">{{$reports->sum('_200')}}</td>
						<td class="derecha">{{$reports->sum('_100')}}</td>
						<td class="derecha">{{$reports->sum('_50')}}</td>
						<td class="derecha">{{$reports->sum('_20')}}</td>
						<td class="derecha">{{$reports->sum('_10')}}</td>
						<td class="derecha">{{$reports->sum('monedas')}}</td>
					</tr>
					<?php $suma_efectivo = $reports->sum('efectivo'); ?>
					<tr>
						<td class="izquierda"></td><td class="izquierda"></td>
						<td class="izquierda"></td><td class="izquierda"></td>
						<td class="derecha bt"><b>Sub Total</b></td>
						<td class="derecha bt"><b>{{$suma_efectivo}}</b></td>
					</tr>
				</tbody>
			</table>
			<table class="bb">
				<thead>
					<tr>
						<th class="izquierda dispenser">Pagos con Tarjeta</th>
						<th class="meter"></th><th class="meter"></th>
						<th class="cantidad"></th><th class="precio"></th>
						<th class="derecha total_bs">Bs.</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="izquierda"></td><td class="izquierda"></td>
						<td class="izquierda"></td><td class="izquierda"></td>
						<td class="derecha bt"><b>Sub Total</b></td>
						<td class="derecha bt"><b>{{number_format($reports->sum('tarjeta'), 2, ',', '.')}}</b></td>
					</tr>
				</tbody>
			</table>
			@if($reports->sum('calibracion')>0)
			<table class="bb">
				<thead>
					<tr>
						<th class="izquierda dispenser">Calibración</th>
						<th class="meter"></th><th class="meter"></th>
						<th class="cantidad"></th><th class="precio"></th>
						<th class="derecha total_bs">Bs.</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="izquierda"></td><td class="izquierda"></td>
						<td class="izquierda"></td><td class="izquierda"></td>
						<td class="derecha bt"><b>Sub Total</b></td>
						<td class="derecha bt"><b>{{number_format($reports->sum('calibracion'), 2, ',', '.')}}</b></td>
					</tr>
				</tbody>
			</table>
			@endif
			<table class="bb general neto">
				<thead>
					<tr>
						<th class="izquierda dispenser">General Neto</th>
						<th class="derecha meter"></th><th class="derecha meter"></th>
						<th class="derecha cantidad"></th>
						<th class="derecha precio">Motivo</th>
						<th class="derecha total_bs">Bs.</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"><b>Ingresos:</b></td>
						<td class="derecha">{{number_format($suma_ingresos, 2, ',', '.')}}</td>
					</tr>
					<tr>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"><b>Egresos:</b></td>
						<td class="derecha">-{{number_format($suma_tickets+$reports->sum('tarjeta')+$reports->sum('calibracion'), 2, ',', '.')}}</td>
					</tr>
					<tr>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"><b>Debe:</b></td>
						<?php $debe=$suma_ingresos-$suma_tickets-$reports->sum('tarjeta')-$reports->sum('calibracion'); ?>
						<td class="derecha"><b>{{number_format($debe, 2, ',', '.')}}</b></td>
					</tr>
					<tr>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"><b>Haber:</b></td>
						<td class="derecha"><b>{{number_format($suma_efectivo, 2, ',', '.')}}</b></td>
					</tr>
					<tr>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"><b>Sobrantes:</b></td>
						<?php $sobrante=($suma_efectivo>$debe)?($suma_efectivo-$debe):0; ?>
						<td class="derecha">{{number_format($sobrante, 2, ',', '.')}}</td>
					</tr>
					<tr>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"></td><td class="derecha"></td>
						<td class="derecha"><b>Faltantes:</b></td>
						<?php $faltante=($debe>$suma_efectivo)?($debe-$suma_efectivo):0; ?>
						<td class="derecha">{{number_format($faltante, 2, ',', '.')}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link type="text/css" href="{{public_path('css/pdf_arqueo.css')}}" rel="stylesheet" />
	<title>Cuadro de Control</title>
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
			<div class="centrado fs-16 bb"><b>CUADRO DE CONTROL</b></div>
			<div class="centrado fs-16 bb"><b>SUMINISTRO DE GAS NATURAL</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Desde:</td>
						<td class="nomb">{{\Carbon\Carbon::parse($date)->format('d/m/Y')}}</td>
						<td class="bold">Hasta:</td>
						<td class="nomb">{{\Carbon\Carbon::parse($date2)->format('d/m/Y')}}</td>
					</tr>
				</tbody>
			</table>
			<table class="bb">
				<thead>
					<tr>
						<th class="centrado bb" rowspan="2">Fecha</th>
						<th class="centrado bb" rowspan="2">Hora</th>
						<th class="centrado bb" rowspan="2">Lectura PRM</th>
						<th class="centrado bb" colspan="3">YPFB Redes de Gas</th>
						<th class="centrado bb" rowspan="2">Venta <br> m3 </th>
						<th class="centrado bb" rowspan="2">Diferencia <br> m3 </th>
						<th class="centrado bb" rowspan="2">%Dif <br> m3 </th>
					</tr>
					<tr>
						<th class="derecha bb">Consumo</th>
						<th class="derecha bb">Factor</th>
						<th class="derecha bb">m3</th>
					</tr>
				</thead>
				<tbody>
					<?php $suma_diff = 0; ?>
					@foreach ($mensurations as $mensu)
					<?php $report_monto = $reports->where('fecha',$mensu->fecha)->sum('monto_total');
					$mensu_next = $mensurations->where('fecha',\Carbon\Carbon::parse($mensu->fecha)->addDay()->format('Y-m-d'))->first(); ?>

					@if(isset($mensu_next->id))

					<?php
					$consumo = $mensu_next->lectura - $mensu->lectura;
					$m3 = intval($consumo*$factor->factor);
					$venta = intval($report_monto);
					$diferencia = intval($venta - $m3);
					$diff = $venta/$m3*100 - 100; ?>
					<tr>
						<td class="centrado">{{\Carbon\Carbon::parse($mensu->fecha)->format('d/m/Y')}}</td>
						<td class="centrado">{{date('H:i',strtotime($mensu->hora))}}</td>
						<td class="derecha">{{$mensu->lectura}}</td>
						<td class="derecha">{{number_format($consumo, 2, ',', '.')}}</td>
						<td class="derecha">{{number_format($factor->factor, 2, ',', '.')}}</td>
						<td class="derecha">{{$m3}}</td>
						<td class="derecha">{{$venta}}</td>
						<td class="derecha">{{$diferencia}}</td>
						<td class="derecha">{{number_format($diff, 2, ',', '.')}}</td>
					</tr>
					<?php $suma_diff += $diff; ?>
					@endif
					@endforeach
				</tbody>
				<tfoot class="bb">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="derecha">Promedio</td>
						<td class="derecha">{{number_format($suma_diff, 2, ',', '.')}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link type="text/css" href="{{public_path('css/pdf_arqueo.css')}}" rel="stylesheet" />
	<link type="text/css" href="{{--url('css/pdf_arqueo.css')--}}" rel="stylesheet" />
	<title>Kardex</title>
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
			</div>
			<div class="membretado">
				<span class="fs-16"><b>{{\Auth::user()->people->office->nombre}}</b></span>
				<br>
				<span>{{\Auth::user()->people->office->direccion}}</span>
				<br>
				<span>{{\Auth::user()->people->office->telefono}}</span>
				<br>
				<span><u>{{\Auth::user()->people->office->ciudad}}</u></span>
			</div>
			<div class="centrado fs-16 bb"><b>Compra de Combustible #{{$buysell->id}}</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Fecha de Compra:</td>
						<td>{{\Carbon\Carbon::parse($buysell->fecha_compra)->format('d/m/Y')}}</td>
						<td class="bold">Fecha Descarga:</td>
						<td>{{$buysell->fecha_descarga ? \Carbon\Carbon::parse($buysell->fecha_descarga)->format('d/m/Y') : null}} {{$buysell->hora_descarga ? ' ['.date('H:i',strtotime($buysell->hora_descarga)).']' : null}}</td>
					</tr>
					<tr>
						<td class="bold">Operador:</td>
						<td>{{$buysell->user->people->nombre_completo}}</td>
						<td class="bold">Usuario:</td>
						<td>{{$buysell->user->name.' : '.$buysell->user->role->name}}</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Valores de Compra</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Débito al Banco:</td>
						<td>{{$buysell->bank->moneda}} {{number_format($buysell->debito_banco, 2, ',', '.')}}</td>
						<td class="bold">Cantidad:</td>
						<td>{{number_format($buysell->cantidad, 2, ',', '.')}} {{$buysell->tank->fuel->unidad}}</td>
					</tr>
					<tr>
						<td class="bold">Cuenta Bancaria:</td>
						<td>{{$buysell->bank->nombre}}</td>
						<td class="bold">Responsable:</td>
						<td>{{$buysell->responsable}}</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Información Adicional</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Nro Factura:</td>
						<td>{{$buysell->factura}}</td>
						<td class="bold">Nro Compra Internet:</td>
						<td>{{$buysell->nro_compra}}</td>
					</tr>
					<tr>
						<td class="bold">Costo Papelera:</td>
						<td>{{$buysell->papeleria}}</td>
						<td class="bold">Costo Adicional:</td>
						<td>{{$buysell->adicional}}</td>
					</tr>
					<tr>
						<td class="bold">Artículo:</td>
						<td>{{$buysell->tank->fuel->nombre}}</td>
						<td class="bold">Tanque:</td>
						<td>{{$buysell->tank->nombre}}</td>
					</tr>
					<tr>
						<td class="bold">Vehículo:</td>
						<td>{{$buysell->vehiculo}}</td>
						<td class="bold">Chofer:</td>
						<td>{{$buysell->chofer}}</td>
					</tr>
				</tbody>
			</table>
			<div class="firma">............................................................................<br>RESPONSABLE</div>
		</div>
	</div>
	@for ($i = 0; $i < $paginas-1; $i++)
	<div class="page-break"></div>
	@endfor
</body>
</html>

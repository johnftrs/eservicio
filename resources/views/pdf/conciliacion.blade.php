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
			<div class="centrado fs-16 bb"><b>Conciliación de Arqueo #{{$conciliation->id}}</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Fecha Registro:</td>
						<td>{{\Carbon\Carbon::parse($conciliation->fecha_conciliacion)->format('d/m/Y')}}</td>
						<td class="bold">Contador:</td>
						<td>{{$conciliation->user->people->nombre_completo}}</td>
						<td class="bold">Usuario:</td>
						<td>{{$conciliation->user->name.' : '.$conciliation->user->role->name}}</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Datos del Depósito</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Fecha Conciliado:</td>
						<td>{{\Carbon\Carbon::parse($conciliation->fecha)->format('d/m/Y')}}</td>
						<td class="bold">Fecha Depósito:</td>
						<td>{{$conciliation->fecha_deposito ? \Carbon\Carbon::parse($conciliation->fecha_deposito)->format('d/m/Y') : null}}</td>
					</tr>
					<tr>
						<td class="bold">Monto Depósito:</td>
						<td>{{$conciliation->bank->moneda}} {{number_format($conciliation->deposito, 2, ',', '.')}}</td>
						<td class="bold">Monto de Arqueos (Efectivo):</td>
						<td>{{$conciliation->bank->moneda}} {{number_format($conciliation->monto, 2, ',', '.')}}</td>
					</tr>
					<tr>
						<td class="bold">Cuenta Bancaria:</td>
						<td>{{$conciliation->bank->nombre}}</td>
						<td class="bold">Nro. Depósito:</td>
						<td>{{$conciliation->nro_deposito}}</td>
					</tr>
					<tr>
						<td class="bold">Observaciones:</td>
						<td colspan="3">{{$conciliation->observaciones}}</td>
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

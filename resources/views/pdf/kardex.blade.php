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
				<img class="marcadeagua" src="">
			</div>
			<div class="membretado">
				<img src="">
				<span class="fs-16"><b>{{$user->people->office->nombre}}</b></span>
				<br>
				<span>{{$user->people->office->direccion}}</span>
				<br>
				<span>{{$user->people->office->telefono}}</span>
				<br>
				<span><u>{{$user->people->office->ciudad}}</u></span>
			</div>
			<div class="centrado fs-16 bb"><b>Kardex Usuario</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Nombre Completo:</td>
						<td>{{$user->people->nombre_completo}}</td>
						<td rowspan="12" class="td_foto">@if($user->people->foto)<img src="{{$user->people->foto}}" alt="">@endif</td>
					</tr>
					<tr>
						<td class="bold">Usuario:</td>
						<td>{{$user->name}}</td>
					</tr>
					<tr>
						<td class="bold">Correo:</td>
						<td>{{$user->email}}</td>
					</tr>
					<tr>
						<td class="bold">Rol:</td>
						<td>{{$user->role->name}}</td>
					</tr>
					<tr>
						<td class="bold">CI:</td>
						<td>{{$user->people->ci}}</td>
					</tr>
					<tr>
						<td class="bold">Fecha de Nacimiento:</td>
						<td>{{$user->people->fecha_nacimiento ? \Carbon\Carbon::parse($user->people->fecha_nacimiento)->format('d/m/Y') : null}}</td>
					</tr>
					<tr>
						<td class="bold">Teléfono:</td>
						<td>{{$user->people->telefono}}</td>
					</tr>
					<tr>
						<td class="bold">2do Teléfono:</td>
						<td>{{$user->people->telefono2}}</td>
					</tr>
					<tr>
						<td class="bold">Dirección:</td>
						<td>{{$user->people->direccion}}</td>
					</tr>
					<tr>
						<td class="bold">Zona:</td>
						<td>{{$user->people->zona}}</td>
					</tr>
					<tr>
						<td class="bold">Grado de Estudio:</td>
						<td>{{$user->people->nivel_estudio}}</td>
					</tr>
					<tr>
						<td class="bold">Estado Civil:</td>
						<td>{{$user->people->estado_civil}} ({{$user->people->hijos.' hijos'}})</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Experiencia Laboral</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Empresa:</td>
						<td>{{$user->people->ex_empresa}}</td>
						<td class="bold">Cargo:</td>
						<td>{{$user->people->ex_cargo}}</td>
					</tr>
					<tr>
						<td class="bold">Tiempo Trabajó:</td>
						<td>{{$user->people->ex_tiempo}}</td>
						<td class="bold">Nombre Jefe:</td>
						<td>{{$user->people->ex_jefe}}</td>
					</tr>
					<tr>
						<td class="bold">Motivo Renuncia:</td>
						<td>{{$user->people->ex_renuncia}}</td>
						<td class="bold">Observaciones:</td>
						<td>{{$user->people->ex_observaciones}}</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Datos Sistema</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Fecha Ingreso:</td>
						<td>{{$user->people->fecha_ingreso ? \Carbon\Carbon::parse($user->people->fecha_ingreso)->format('d/m/Y') : null}}</td>
						<td class="bold">Fecha Retiro:</td>
						<td>{{$user->people->fecha_retiro ? \Carbon\Carbon::parse($user->people->fecha_retiro)->format('d/m/Y') : null}}</td>
					</tr>
					<tr>
						<td class="bold">Casillero:</td>
						<td>{{$user->people->casillero}}</td>
						<td class="bold">Usuario SIGES:</td>
						<td>{{$user->people->siges}}</td>
					</tr>
					<tr>
						<td class="bold">Biométrico:</td>
						<td>{{$user->people->biometrico}}</td>
						<td class="bold">Usuario SoftControl:</td>
						<td>{{$user->people->softcontrol}}</td>
					</tr>
					<tr>
						<td class="bold">Cuenta BMSC:</td>
						<td>{{$user->people->cuenta_bmsc}}</td>
						<td class="bold">AFP:</td>
						<td>{{$user->people->afp}}</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Datos Garante</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Nombre:</td>
						<td>{{$user->people->nombre_garante}}</td>
						<td class="bold">Parentezco:</td>
						<td>{{$user->people->relacion_garante}}</td>
					</tr>
					<tr>
						<td class="bold">Teléfono:</td>
						<td>{{$user->people->telefono_garante}}</td>
						<td class="bold">Trabajo:</td>
						<td>{{$user->people->trabajo_garante}}</td>
					</tr>
					<tr>
						<td class="bold">Dirección:</td>
						<td>{{$user->people->direccion_garante}}</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="centrado fs-16 bb"><b>Referencia Personal</b></div>
			<table class="">
				<tbody>
					<tr>
						<td class="bold">Nombre:</td>
						<td>{{$user->people->nombre_referencia_personal}}</td>
						<td class="bold">Parentezco:</td>
						<td>{{$user->people->relacion_referencia_personal}}</td>
					</tr>
					<tr>
						<td class="bold">Teléfono:</td>
						<td>{{$user->people->telefono_referencia_personal}}</td>
						<td class="bold">Trabajo:</td>
						<td>{{$user->people->trabajo_referencia_personal}}</td>
					</tr>
					<tr>
						<td class="bold">Dirección:</td>
						<td>{{$user->people->direccion_referencia_personal}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	@for ($i = 0; $i < $paginas-1; $i++)
	<div class="page-break"></div>
	@endfor
</body>
</html>

@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/report')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class="col-4">
				<div class="col-2">
					<div class="form-group">
						{!! Form::label('Ticket Id*') !!}
						<input type="checkbox" class="check" name="id" value="id">
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						{!! Form::label('Solicitante') !!}
						<div class="selectpicker">
							<a class="btn form-control primary" name="solicitante_id">Seleccione un Solicitante<i class="mdi mdi-menu-right"></i></a>
							<div>
								<input type="text" class="buscador" placeholder="Buscar..">
								<ul>
									@foreach ($clients as $solicitante)
									<li><a class="selectpicker-option " value="{{$solicitante->id}}">{{$solicitante->nombre}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<select name="solicitante_id" class="form-control selectpicker" data-live-search="true" id="payments_ticket">
							<option selected disabled></option>
							@foreach ($clients as $solicitante)
							<option value="{{$solicitante->id}}">
								{{$solicitante->nombre}}
							</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Inicio*') !!}
					{!! Form::text('fecha_inicio',Carbon\Carbon::now()->subMonth(1)->format('d/m/Y'),['class'=>'form-control datepicker', 'autocomplete'=>'off','required']) !!}
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Fin*') !!}
					{!! Form::text('fecha_fin',Carbon\Carbon::now()->format('d/m/Y'),['class'=>'form-control datepicker', 'autocomplete'=>'off','required']) !!}
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Solicitante:') !!}
					<input type="checkbox" class="check" name="solicitante" value="solicitante">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Sub Cliente:') !!}
					<input type="checkbox" class="check" name="subcliente" value="subcliente">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Solicitante Nit:') !!}
					<input type="checkbox" class="check" name="nit_sol" value="nit">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Sub Cliente Nit:') !!}
					<input type="checkbox" class="check" name="nit" value="nit">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Solicitante Telefono:') !!}
					<input type="checkbox" class="check" name="telefono_sol" value="telefono">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Sub Cliente Telefono:') !!}
					<input type="checkbox" class="check" name="telefono" value="telefono">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Solicitante Telefono 2:') !!}
					<input type="checkbox" class="check" name="telefono2_sol" value="telefono2">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Sub Cliente Telefono 2:') !!}
					<input type="checkbox" class="check" name="telefono2" value="telefono2">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Solicitante Categoría:') !!}
					<input type="checkbox" class="check" name="category_id_sol" value="category_id">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Sub Cliente Categoría:') !!}
					<input type="checkbox" class="check" name="category_id" value="category_id">
				</div>
			</div>


			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Asegurado') !!}
					<input type="checkbox" class="check" name="asegurado" value="asegurado">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Contacto') !!}
					<input type="checkbox" class="check" name="detalles_auto" value="detalles_auto">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Marca') !!}
					<input type="checkbox" class="check" name="marca" value="marca">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Modelo') !!}
					<input type="checkbox" class="check" name="modelo" value="modelo">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Tipo') !!}
					<input type="checkbox" class="check" name="tipo" value="tipo">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Placa') !!}
					<input type="checkbox" class="check" name="placa" value="placa">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Año') !!}
					<input type="checkbox" class="check" name="anyo" value="anyo">
				</div>
			</div>
			<div class="col-1 orange-soft">
				<div class="form-group">
					{!! Form::label('Color') !!}
					<input type="checkbox" class="check" name="color" value="color">
				</div>
			</div>


			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Estado Del Ticket:') !!}
					<input type="checkbox" class="check" name="estado" value="estado">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Detalles Del Ticket:') !!}
					<input type="checkbox" class="check" name="detalles" value="detalles">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Dirección Solicitada:') !!}
					<input type="checkbox" class="check" name="direccion_solicitada" value="direccion_solicitada">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Ubicación Solicitada:') !!}
					<input type="checkbox" class="check" name="coordenada_solicitada" value="coordenada_solicitada">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Dirección Solicitada:') !!}
					<input type="checkbox" class="check" name="direccion_destino" value="direccion_destino">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Ubicación Solicitada:') !!}
					<input type="checkbox" class="check" name="coordenada_destino" value="coordenada_destino">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Localidad:') !!}
					<input type="checkbox" class="check" name="location" value="location">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Servicio:') !!}
					<input type="checkbox" class="check" name="servicio" value="servicio">
				</div>
			</div>
			<div class="col-2 green-soft">
				<div class="form-group">
					{!! Form::label('Precio Total:') !!}
					<input type="checkbox" class="check" name="precio_total" value="precio_total">
				</div>
			</div>
			<div class="col-2 green-soft">
				<div class="form-group">
					{!! Form::label('Precio Solicitante:') !!}
					<input type="checkbox" class="check" name="precio_solicitante" value="precio_solicitante">
				</div>
			</div>
			<div class="col-2 green-soft">
				<div class="form-group">
					{!! Form::label('Precio Excedente:') !!}
					<input type="checkbox" class="check" name="precio_excedente" value="precio_excedente">
				</div>
			</div>
			<div class="col-2 green-soft">
				<div class="form-group">
					{!! Form::label('Abono Solicitante:') !!}
					<input type="checkbox" class="check" name="abono_solicitante" value="abono_solicitante">
				</div>
			</div>
			<div class="col-2 green-soft">
				<div class="form-group">
					{!! Form::label('Abono Excedente:') !!}
					<input type="checkbox" class="check" name="abono_excedente" value="abono_excedente">
				</div>
			</div>



			<div class="col-4">
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Cita:') !!}
					<input type="checkbox" class="check" name="fecha_cita" value="fecha_cita">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Inicio:') !!}
					<input type="checkbox" class="check" name="fecha_inicio_serv" value="fecha_inicio_serv">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Fin:') !!}
					<input type="checkbox" class="check" name="fecha_fin_serv" value="fecha_fin_serv">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Registro:') !!}
					<input type="checkbox" class="check" name="fecha_registro" value="fecha_registro">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Modificación:') !!}
					<input type="checkbox" class="check" name="fecha_modificacion" value="fecha_modificacion">
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Usuario:') !!}
					<input type="checkbox" class="check" name="usuario" value="usuario">
				</div>
			</div>



			<div class="col-4">
				<div class="col-2 nb">
					{!! Form::submit('Generar Excel',['class'=>'btn primary col-4']) !!}
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
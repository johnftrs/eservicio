<?php
if(isset($service->subcliente->nombre)){
	$check_nombre = true;
} else { $check_nombre = false;}

if(isset($service->direccion_destino)){
	if($service->direccion_destino!='' && $service->direccion_destino!=null){
		$check_direcc = true;
	} else {$check_direcc = false;}
} else {$check_direcc = false;}

if(isset($service->fecha_fin)){
	if($service->fecha_fin!='' && $service->fecha_fin!=null){
		$check_fin = true;
	} else {$check_fin = false;}
} else {$check_fin = false;}
?>
@if (isset($service))
<div class="f24" style="margin-top:10px;margin-bottom:20px;">Ticket: {{$service->id}} - {{$service->price->type->nombre}}</div>
@endif
<div class="col-4 mb">
	<div class="col-1 green-soft">
		<div class="form-group">
			{!! Form::label('check_subcliente','Sub Cliente:') !!}
			<input type="checkbox" class="check" name="check_subcli" id="check_subcliente" value="" {{$check_nombre?'checked':''}}>
		</div>
	</div>
	<div class="col-1 blue">
		<div class="form-group">
			{!! Form::label('check_grua','Grua:') !!}
			<input type="checkbox" class="check" name="grua" id="check_grua" value="" {{$check_direcc?'checked':''}}>
		</div>
	</div>
	<div class="col-1 red-soft">
		<div class="form-group">
			{!! Form::label('check_fin','Finalización:') !!}
			<input type="checkbox" class="check" name="grua" id="check_fin" value="" {{$check_fin?'checked':''}}>
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nombre Completo (Solicitante)') !!}
			<div class="text-select">
				{!! Form::text('nombre_sol',$service->solicitante->nombre ?? null,['class'=>'form-control buscador autocompletar','required', 'maxlength'=>191,'autocomplete'=>'off', 'autocomplete']) !!}
				<ul class="ul_lista_nombres">
					@foreach ($clients as $client)
					<li><a class="li_solicitante" client_id_sol="{{$client->id}}" nit_sol="{{$client->nit}}" telefono_sol="{{$client->telefono}}" telefono2_sol="{{$client->telefono2}}" category_id_sol="{{$client->category_id}}">{{$client->nombre}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="col-2">
		<div class="col-4">
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Nit') !!}
					{!! Form::text('nit_sol',$service->solicitante->nit ?? null,['class'=>'form-control nit_sol', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Telefono') !!}
					{!! Form::text('telefono_sol',$service->solicitante->telefono ?? null,['class'=>'form-control telefono_sol', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Otros Telefonos') !!}
					{!! Form::text('telefono2_sol',$service->solicitante->telefono2 ?? null,['class'=>'form-control telefono2_sol', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Categoría') !!}
					{!! Form::select('category_id_sol', $categories, $service->solicitante->category_id ?? null, ['class'=>'form-control category_id_sol','id'=>'categoria_sol']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-4 green-soft contenedor_subcliente" {!!$check_nombre?'':'style="display: none;"'!!}>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nombre (Sub-Cliente)') !!}
			<div class="text-select">
				{!! Form::text('nombre',$service->subcliente->nombre ?? null,['class'=>'form-control buscador autocompletar subcliente', 'maxlength'=>191,'autocomplete'=>'off', 'autocomplete']) !!}
				<ul class="ul_lista_nombres">
					@foreach ($clients as $client)
					<li><a class="li_subcliente" client_id="{{$client->id}}" nit="{{$client->nit}}" telefono="{{$client->telefono}}" telefono2="{{$client->telefono2}}" category_id="{{$client->category_id}}">{{$client->nombre}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="col-2">
		<div class="col-4">
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Nit') !!}
					{!! Form::text('nit',$service->subcliente->nit ?? null,['class'=>'form-control nit', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Telefono') !!}
					{!! Form::text('telefono',$service->subcliente->telefono ?? null,['class'=>'form-control telefono', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Otros Telefonos') !!}
					{!! Form::text('telefono2',$service->subcliente->telefono2 ?? null,['class'=>'form-control telefono2', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Categoría') !!}
					{!! Form::select('category_id', $categories, $service->subcliente->category_id ?? null, ['class'=>'form-control category_id','id'=>'categoria']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-4 orange-soft">
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Usuario') !!}
			{!! Form::text('asegurado',$service->car->asegurado ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'asegurado']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			<i class="mdi mdi-phone"></i> {!! Form::label('Contacto') !!}
			{!! Form::text('detalles_auto',$service->car->detalles ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'detalles']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Marca') !!}
			{!! Form::text('marca',$service->car->marca ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'marca']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Modelo') !!}
			{!! Form::text('modelo',$service->car->modelo ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'modelo']) !!}
		</div>
	</div>
</div>
<div class="col-4 orange-soft">
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Tipo') !!}
			{!! Form::text('tipo',$service->car->tipo ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'tipo']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Placa') !!}
			{!! Form::text('placa',$service->car->placa ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'placa','onkeypress'=>"return justAlfa(event);"]) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Año') !!}
			{!! Form::text('anyo',$service->car->anyo ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'anyo']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Color') !!}
			{!! Form::text('color',$service->car->color ?? null,['class'=>'form-control','autocomplete'=>'off', 'maxlength'=>191, 'id'=>'color']) !!}
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Dirección Solicitada') !!}
			{!! Form::text('direccion_solicitada',$service->direccion_solicitada ?? null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Localidad') !!}
			<select id="location" name="location_id" class="form-control location_select" required>
				@if (!isset($service->location_id))
				<option value="" selected disabled></option>
				@endif
				@foreach ($locations as $location)
				<option value="{{$location->id}}" {{isset($service->location_id)?($service->location_id==$location->id?'selected':''):''}} coordenada="{{$location->coordenada}}">{{$location->nombre}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Dirección Solicitada GPS') !!}
			{!! Form::text('coordenada_solicitada',$service->coordenada_solicitada ?? null,['class'=>'form-control coordenada coordenada_solicitada', 'maxlength'=>191,'autocomplete'=>'off']) !!}
			<button type="button" input="coordenada_solicitada" class="btn btn-min ancho default mapsbtn">Mapa</button>
		</div>
	</div>
</div>
<div class="col-4 blue cont_destino" {!!$check_direcc?'':'style="display: none;"'!!}>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('Dirección Destino') !!}
			{!! Form::text('direccion_destino',$service->direccion_destino ?? null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off','id'=>'direccion_destino']) !!}
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Destino GPS') !!}
			{!! Form::text('coordenada_destino',$service->coordenada_destino ?? null,['class'=>'form-control coordenada', 'maxlength'=>191,'autocomplete'=>'off']) !!}
			<button type="button" input="coordenada_destino" class="btn btn-min ancho default mapsbtn2">Mapa</button>
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Tipo Servicio*') !!}
			<select name="price_id" id="type" class="form-control" sel="{{(isset($service->price_id))?$service->price_id:null}}" required>
				@if (!isset($service->price_id))
				<option value="" selected disabled></option>
				@endif
				@foreach ($precios as $price)
				<option value="{{$price->id}}" location="{{$price->location_id}}" price="{{$price->precio}}" cat="{{$price->category_id}}" categoria="{{$price->type->categoria}}" {{isset($service->price_id)?($service->price_id==$price->id?'selected':''):''}}
					@if (isset($service->location_id)) {{--si es editar--}}
					@if ($check_nombre == true) {{--si hay subcliente--}}
					{{($price->category_id==$service->subcliente->category_id && $service->location_id==$price->location_id)?(''):('hidden')}}
					@else
					{{($price->category_id==$service->solicitante->category_id && $service->location_id==$price->location_id)?(''):('hidden')}}
					@endif
					@else
					{{($price->category_id==$categories->flip()->first() && $price->location_id==$locations->flip()->first())?'':'hidden'}}
					@endif
					>({{$price->location->nombre}}) [{{$price->category->nombre}}] {{$price->type->nombre}} - {{$price->precio}}bs</option>
				}
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-2">
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Precio del Servicio') !!}
				<div style="display: flex;"><span style="padding-top: 10px;">Bs.</span>{!! Form::text('precio_total',$service->precio_total ?? null,['class'=>'form-control', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','id'=>'precio_total','required']) !!}</div>
			</div>
		</div>
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Monto Solicitante') !!}
				<div style="display: flex;"><span style="padding-top: 10px;">Bs.</span>{!! Form::text('precio_solicitante',$service->precio_solicitante ?? null,['class'=>'form-control', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','id'=>'precio_solicitante']) !!}</div>
			</div>
		</div>
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Excedente') !!}
				<div style="display: flex;"><span style="padding-top: 10px;">Bs.</span>{!! Form::text('precio_excedente',$service->precio_excedente ?? null,['class'=>'form-control', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','id'=>'precio_excedente']) !!}</div>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-1-3">
		<div class="col-4">
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Cita*') !!}
					{!! Form::text('fecha_cita',(isset($service->fecha_cita))?Carbon\Carbon::parse($service->fecha_cita)->format('d/m/Y'):Carbon\Carbon::now()->format('d/m/Y'),['class'=>'form-control datepicker', 'autocomplete'=>'off','required']) !!}
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Hora Cita*') !!}
					{!! Form::text('hora',(isset($service->fecha_cita))?Carbon\Carbon::parse($service->fecha_cita)->format('H:i'):Carbon\Carbon::now()->format('H:i'),['class'=>'form-control telefono_cliente', 'maxlength'=>191,'autocomplete'=>'off','required']) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="col-1-3">
		<div class="col-4">
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Responsable') !!}
					<select name="chofer_id" class="form-control" required>
						@if (!isset($service->chofer_id))
						<option value="" selected disabled></option>
						@endif
						@foreach ($choferes as $chofer)
						<option value="{{$chofer->id}}" {{isset($service->chofer_id)?($service->chofer_id==$chofer->id?'selected':''):''}}>{{$chofer->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Unidad de Asistencia') !!}
					<select name="crane_id" class="form-control" required>
						@if (!isset($service->crane_id))
						<option value="" selected disabled></option>
						@endif
						@foreach ($cranes as $crane)
						<option value="{{$crane->id}}" {{isset($service->crane_id)?($service->crane_id==$crane->id?'selected':''):''}}>{{$crane->codigo}} - {{$crane->modelo}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-4 red-soft cont_fin" {!!$check_fin?'':'style="display: none;"'!!}>
	<div class="col-1-3">
		<div class="col-4">
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Fecha Fin') !!}
					{!! Form::text('fecha_fin',(isset($service->fecha_fin))?Carbon\Carbon::parse($service->fecha_fin)->format('d/m/Y'):null,['class'=>'form-control datepicker', 'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('Hora Fin') !!}
					{!! Form::text('hora_fin',(isset($service->fecha_fin))?Carbon\Carbon::parse($service->fecha_fin)->format('H:i'):null,['class'=>'form-control telefono_cliente', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
	<div class="form-group">
		{!! Form::label('Detalles') !!}
		{!! Form::text('detalles',$service->detalles ?? null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off']) !!}
	</div>
</div>

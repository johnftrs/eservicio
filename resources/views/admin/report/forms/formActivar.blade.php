<div class="form-group">
	{!! Form::label('Vale*','',['class'=>'naranja']) !!}
	<div class="text-select">
		<input type="text" wire:model="input_busca" onclick="buscar(this);" class="form-control buscador" placeholder="Buscar..">
		<ul id="ul_tickets">
			@foreach ($tickets as $tx)
			<li class="li_cliente {{$tx->estado}}" ticket_id="{{$tx->id}}" monto="{{$tx->monto}}">
				<a class="{{$tx->id}}">Vale: No. [{{$tx->codigo}}] Serie: [{{$tx->lot->serie}}] Lote:[{{$tx->lot->inicio}}-{{$tx->lot->fin}}] Estado:[{{$tx->estado}}]</a>
			</li>
			@endforeach
		</ul>
	</div>
	@error ('ticket_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Monto*','',['class'=>'naranja']) !!}
	<input wire:model="monto" type="number" name="monto" placeholder="Inserte Monto" class="form-control">
	@error ('monto') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('[Cliente] - Chofer*','',['class'=>'naranja']) !!}
	<select wire:model="driver_id" name="driver_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($drivers as $driver)
		<option value="{{$driver->id}}">[{{$driver->client->nombre}}] - {{$driver->nombre}} {{$driver->paterno}}</option>
		@endforeach
	</select>
	@error ('driver_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('[Cliente] - Vehículo*','',['class'=>'naranja']) !!}
	<select wire:model="vehicle_id" name="vehicle_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($vehicles as $vehicle)
		<option value="{{$vehicle->id}}">[{{$vehicle->client->nombre}}] - {{$vehicle->marca}} - {{$vehicle->placa}}</option>
		@endforeach
	</select>
	@error ('vehicle_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Dispenser*','',['class'=>'naranja']) !!}
	<select wire:model="dispenser_id" name="dispenser_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($dispensers as $dispenser)
		<option value="{{$dispenser->id}}">{{$dispenser->nombre}} - {{$dispenser->fuel->nombre}}</option>
		@endforeach
	</select>
	@error ('dispenser_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Turno*','',['class'=>'naranja']) !!}
	<select wire:model="turn_id" name="turn_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($turns as $turn)
		<option value="{{$turn->id}}">{{$turn->nombre}}</option>
		@endforeach
	</select>
	@error ('turn_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	<input wire:model="detalle" type="text" name="detalle" placeholder="Inserte Detalles" class="form-control">
	@error ('detalle') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<th class="centrado">Vale</th>
			<th class="centrado">Serie</th>
			<th class="centrado">Monto</th>
			<th class="centrado">Estado</th>
			<th class="centrado">Fecha</th>
			<th class="centrado">Chofer</th>
			<th class="centrado">Vehículo</th>
			<th class="centrado">Dispenser</th>
			<th class="centrado">Detalles</th>
			<th class="centrado">Usuario</th>
		</thead>
		<tbody>
			@foreach($tickets->where('report_id',$modelo_id) as $ticket)
			<tr class="{{$ticket->estado}}">
				<td class="centrado">{{$ticket->codigo}}</td>
				<td class="centrado">{{$tx->lot->serie}} [{{$tx->lot->inicio}}-{{$tx->lot->fin}}]</td>
				<td class="centrado">{{$ticket->monto ? 'Bs. '.number_format($ticket->monto, 2, ',', '.') : ''}}</td>
				<td class="centrado"><b>{{$ticket->estado}}</b></td>
				<td class="centrado">{{$ticket->fecha_uso ? \Carbon\Carbon::parse($ticket->fecha_uso)->format('d/m/Y') : ''}}</td>
				<td class="centrado">{{isset($ticket->driver_id)? $ticket->driver->nombre : null}}</td>
				<td class="centrado">{{isset($ticket->vehicle_id)? $ticket->vehicle->placa : null}} - {{isset($ticket->vehicle_id)? $ticket->vehicle->marca : null}}</td>
				<td class="centrado">{{isset($ticket->dispenser_id)? $ticket->dispenser->nombre : null}}</td>
				<td class="centrado">{{$ticket->detalle}}</td>
				<td class="centrado">{{isset($ticket->user_id)? $ticket->user->name : null}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script>
	$('body').on('click','.li_cliente',function() {
		@this.set('ticket_id',$(this).attr('ticket_id'));
		@this.set('monto',$(this).attr('monto'));
		@this.set('input_busca',$(this).children('a').html());
	});
</script>
<div class="card">
	@include('alerts.error')
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='EOFF'){ $editar=true; }
		if ($func->code=='DOFF'){ $eliminar=true; }
	} ?>
	<div class="card-header primary-low">
		<h5 class="card-title">Vale: {{$codigo}}{{$serie}}</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
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
		</div>
		<div class="col-4">
			<div class="col-1-3"></div>
			<div class="col-1-3">
				<button wire:click="store()" type="submit" class="btn primary col-4">Usar el Vale</button>

			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th class="centrado">Codigo</th>
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
					@foreach($tickets->where('codigo',$codigo) as $ticket)
					<tr class="{{$ticket->estado}}">
						<td class="centrado">{{$ticket->codigo}}</td>
						<td class="centrado">{{$ticket->serie}}</td>
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
	</div>
	@section('adminjs')
	<script type="text/javascript">
		document.addEventListener('livewire:load', function () {
			@this.set('ticket_id',window.location.href.split('/ticket/')[1]);
		});
	</script>
	@endsection
</div>
<div class="card">
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='EOFF'){ $editar=true; }
		if ($func->code=='DOFF'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title">Vale: {{$codigo}}</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group">
				{!! Form::label('Código') !!}
				<input wire:model="codigo" type="number" id="input_codigo" name="codigo" placeholder="Inserte Código" class="form-control">
				@error ('codigo') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="form-group">
				{!! Form::label('Chofer - Cliente') !!}
				<select wire:model="driver_id" class="form-control">
					<option value="">-- Seleccione una opción --</option>
					@foreach ($drivers as $driver)
					<option value="{{$driver->id}}">{{$driver->client->nombre}} - {{$driver->nombre}} {{$driver->paterno}}</option>
					@endforeach
				</select>
				@error ('driver_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="form-group">
				{!! Form::label('Vehículo') !!}
				<select wire:model="vehicle_id" class="form-control">
					<option value="">-- Seleccione una opción --</option>
					@foreach ($vehicles as $vehicle)
					<option value="{{$vehicle->id}}">{{$vehicle->marca}} - {{$vehicle->placa}}</option>
					@endforeach
				</select>
				@error ('vehicle_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="form-group">
				{!! Form::label('Manguera') !!}
				<select wire:model="hosepipe_id" class="form-control">
					<option value="">-- Seleccione una opción --</option>
					@foreach ($hosepipes as $hosepipe)
					<option value="{{$hosepipe->id}}">{{$hosepipe->nombre}} - {{$hosepipe->fuel->nombre}}</option>
					@endforeach
				</select>
				@error ('hosepipe_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
		</div>
		<div class="col-4">
			<div class="col-1-3"></div>
			<div class="col-1-3">
				<button wire:click="store()" type="submit" class="btn primary col-4">Activar el Vale</button>

			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th class="centrado">Codigo</th>
					<th class="centrado">Monto</th>
					<th class="centrado">Estado</th>
					<th class="centrado">Fecha</th>
					<th class="centrado">Chofer</th>
					<th class="centrado">Vehículo</th>
					<th class="centrado">Manguera</th>
					<th class="centrado">Usuario</th>
				</thead>
				<tbody>
					@foreach($tickets->where('codigo',$codigo) as $ticket)
					<tr class="{{$ticket->estado=='Inactivo'?'rojo':( $ticket->estado=='Usado'?'verde':'' )}}">
						<td class="centrado">{{$ticket->codigo}}</td>
						<td class="centrado">{{$ticket->monto}}</td>
						<td class="centrado">{{$ticket->estado}}</td>
						<td class="centrado">{{$ticket->fecha_uso}}</td>
						<td class="centrado">{{isset($ticket->driver_id)? $ticket->driver->nombre : null}}</td>
						<td class="centrado">{{isset($ticket->vehicle_id)? $ticket->vehicle->placa : null}} - {{isset($ticket->vehicle_id)? $ticket->vehicle->marca : null}}</td>
						<td class="centrado">{{isset($ticket->hosepipe_id)? $ticket->hosepipe->nombre : null}}</td>
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
			@this.set('codigo',window.location.href.split('/ticket/')[1]);
		});
	</script>
	@endsection
</div>
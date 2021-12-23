<div class="form-group">
	{!! Form::label('Código') !!}
	<input wire:model="codigo" type="number" name="codigo" placeholder="Inserte Código" class="form-control">
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
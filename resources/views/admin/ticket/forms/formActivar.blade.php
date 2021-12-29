<div class="form-group">
	{!! Form::label('Código*','',['class'=>'naranja']) !!}
	<input wire:model="codigo" type="number" name="codigo" placeholder="Inserte Código" class="form-control">
	@error ('codigo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Monto') !!}
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
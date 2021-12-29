<div class="form-group">
	{!! Form::label('Nombre') !!}
	<input wire:model="h_nombre" type="text" name="h_nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('h_nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Tanque') !!}
	<select wire:model="h_tank_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($tanks as $tank)
		<option value="{{$tank->id}}">[{{$tank->fuel->nombre}}] - {{$tank->nombre}}</option>
		@endforeach
	</select>
	@error ('h_tank_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
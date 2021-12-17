<div class="form-group">
	{!! Form::label('Nombre') !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control" required>
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('NIT') !!}
	<input wire:model="nit" type="text" name="nit" placeholder="Inserte Nombre" class="form-control">
	@error ('nit') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion" type="text" name="direccion" placeholder="Inserte Nombre" class="form-control">
</div>
<div class="form-group">
	{!! Form::label('Localidad') !!}
	<select wire:model="location_id" name="location_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($locations as $location)
		<option value="{{$location->id}}">{{$location->nombre}}</option>
		@endforeach
	</select>
	@error ('location_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Coordenada GPS') !!}
	<input wire:model="coordenada" type="text" name="coordenada" placeholder="Inserte Nombre" class="form-control">
	<button type="button" input="coordenada" class="btn btn-min ancho default mapsbtn">Mapa</button>
</div>
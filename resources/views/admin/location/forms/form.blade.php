<div class="form-group">
	{!! Form::label('Nombre*') !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Coordenada GPS') !!}
	<input wire:model="coordenada" type="text" name="coordenada" placeholder="Inserte Nombre" class="form-control">
	@error ('coordenada') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Ciudad*') !!}
	<select wire:model="city_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($cities as $city)
		<option value="{{$city->id}}">{{$city->nombre}}</option>
		@endforeach
	</select>
	@error ('city_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
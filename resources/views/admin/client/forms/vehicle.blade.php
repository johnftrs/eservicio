<div class="form-group">
	{!! Form::label('Placa*') !!}
	<input wire:model="v_placa" type="text" name="v_placa" placeholder="Inserte Placa" class="form-control">
	@error ('v_placa') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Marca') !!}
	<input wire:model="v_marca" type="text" name="v_marca" placeholder="Inserte Marca" class="form-control">
	@error ('v_marca') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Modelo') !!}
	<input wire:model="v_modelo" type="text" name="v_modelo" placeholder="Inserte Modelo" class="form-control">
	@error ('v_modelo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Año') !!}
	<input wire:model="v_anyo" type="text" name="v_anyo" placeholder="Inserte Año" class="form-control">
	@error ('v_anyo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Color') !!}
	<input wire:model="v_color" type="text" name="v_color" placeholder="Inserte Color" class="form-control">
	@error ('v_color') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado') !!}
	<select wire:model="v_estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Inactivo">Inactivo</option>
	</select>
	@error ('v_estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
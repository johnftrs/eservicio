<div class="form-group">
	{!! Form::label('Código Inicial') !!}
	<input wire:model="codigo" type="number" name="codigo" placeholder="Inserte Código Inicial" class="form-control">
	@error ('codigo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
@if ($this->accion == 'store')
<div class="form-group">
	{!! Form::label('Código Final') !!}
	<input wire:model="codigo_fin" type="number" name="codigo_fin" placeholder="Inserte Código Final" class="form-control">
	@error ('codigo_fin') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
@endif
<div class="form-group">
	{!! Form::label('Monto') !!}
	<input wire:model="monto" type="number" name="monto" placeholder="Inserte Monto" class="form-control">
	@error ('monto') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado') !!}
	<select wire:model="estado" name="estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Inactivo">Inactivo</option>
		<option value="Usado">Usado</option>
	</select>
	@error ('estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
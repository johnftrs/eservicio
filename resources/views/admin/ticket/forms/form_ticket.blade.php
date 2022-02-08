<div class="form-group">
	{!! Form::label('Número*','',['class'=>'naranja']) !!}
	<input wire:model="codigo" type="number" name="codigo" placeholder="Inserte Número" class="form-control">
	@error ('codigo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Monto') !!}
	<input wire:model="monto" type="number" name="monto" placeholder="Inserte Monto" class="form-control">
	@error ('monto') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado*','',['class'=>'naranja']) !!}
	<select wire:model="estado" name="estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Faltante">Faltante/Falla Imp.</option>
		<option value="Inactivo">Inactivo</option>
		<option value="Extraviado">Extraviado</option>
		<option value="Usado">Usado</option>
		<option value="Registrado">Registrado</option>
	</select>
	@error ('estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	<input wire:model="detalle" type="text" name="detalle" placeholder="Inserte Detalles" class="form-control">
	@error ('detalle') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
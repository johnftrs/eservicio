<div class="form-group">
	{!! Form::label('Nombre*','',['class'=>'naranja']) !!}
	<input wire:model="d_nombre" type="text" name="d_nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('d_nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Apellido Paterno') !!}
	<input wire:model="d_paterno" type="text" name="d_paterno" placeholder="Inserte Apellido Paterno" class="form-control">
	@error ('d_paterno') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Apellido Materno') !!}
	<input wire:model="d_materno" type="text" name="d_materno" placeholder="Inserte Apellido Materno" class="form-control">
	@error ('d_materno') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('CI') !!}
	<input wire:model="d_ci" type="text" name="d_ci" placeholder="Inserte CI" class="form-control">
	@error ('d_ci') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Licencia') !!}
	<input wire:model="d_licencia" type="text" name="d_licencia" placeholder="Inserte Licencia" class="form-control">
	@error ('d_licencia') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado*','',['class'=>'naranja']) !!}
	<select wire:model="d_estado" name="d_estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Inactivo">Inactivo</option>
	</select>
	@error ('d_estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
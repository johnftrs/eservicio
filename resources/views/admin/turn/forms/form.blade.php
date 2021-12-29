<div class="form-group">
	{!! Form::label('Nombre*','',['class'=>'naranja']) !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control" required>
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado') !!}
	<select wire:model="estado" name="estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Inactivo">Inactivo</option>
	</select>
	@error ('estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Hora de inicio - [HH:mm]') !!}
	<input wire:model="hora_inicio" type="text" name="hora_inicio" placeholder="HH:mm" class="form-control">
	@error ('hora_inicio') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Hora Fin - [HH:mm]') !!}
	<input wire:model="hora_fin" type="text" name="hora_fin" placeholder="HH:mm" class="form-control">
	@error ('hora_fin') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
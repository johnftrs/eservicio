<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Razón Social*','',['class'=>'naranja']) !!}
			<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
			@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nit') !!}
			<input wire:model="nit" type="text" name="nit" placeholder="Inserte Nit" class="form-control">
			@error ('Nit') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion" type="text" name="direccion" placeholder="Inserte Dirección" class="form-control">
	@error ('direccion') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Telefono') !!}
			<input wire:model="telefono" type="number" name="telefono" placeholder="Inserte Telefono" class="form-control">
			@error ('telefono') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('2do Telefono') !!}
			<input wire:model="telefono2" type="number" name="telefono2" placeholder="Inserte Telefono" class="form-control">
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Estado*','',['class'=>'naranja']) !!}
	<select wire:model="estado" name="estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Inactivo">Inactivo</option>
	</select>
	@error ('estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<br>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nombre Representante Legal') !!}
			<input wire:model="representante_legal" type="text" name="representante_legal" placeholder="Representante Legal" class="form-control">
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Ci Representante Legal') !!}
			<input wire:model="representante_ci" type="text" name="representante_ci" placeholder="CI Representante" class="form-control">
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Telefono Representante Legal') !!}
			<input wire:model="representante_telefono" type="text" name="representante_telefono" placeholder="elefono Representante" class="form-control">
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('2do Telefono Representante Legal') !!}
			<input wire:model="representante_telefono2" type="text" name="representante_telefono2" placeholder="2do Telefono Representante" class="form-control">
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Email Representante Legal') !!}
			<input wire:model="representante_email" type="text" name="representante_email" placeholder="Email Representante" class="form-control">
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Información Extra') !!}
			<input wire:model="representante_detalles" type="text" name="representante_detalles" placeholder="Informacion Representante" class="form-control">
		</div>
	</div>
</div>
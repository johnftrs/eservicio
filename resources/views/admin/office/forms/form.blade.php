<div class="form-group">
	{!! Form::label('Razón Social*','',['class'=>'naranja']) !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Razón Social" class="form-control" required>
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Teléfono') !!}
	<input wire:model="telefono" type="text" name="telefono" placeholder="Inserte Teléfono" class="form-control">
	@error ('telefono') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('NIT') !!}
	<input wire:model="nit" type="text" name="nit" placeholder="Inserte NIT" class="form-control">
	@error ('nit') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Ciudad') !!}
	<input wire:model="ciudad" type="text" name="ciudad" placeholder="Inserte Nombre" class="form-control">
	@error ('ciudad') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion" type="text" name="direccion" placeholder="Inserte Dirección" class="form-control">
</div>
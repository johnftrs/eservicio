<div class="form-group">
	{!! Form::label('Nombre') !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Precio') !!}
	<input wire:model="precio" type="number" name="precio" placeholder="Inserte Precio" class="form-control">
	@error ('precio') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Unidad de Medida Combustible') !!}
	<input wire:model="unidad" type="text" name="unidad" placeholder="Inserte Unidad" class="form-control">
	@error ('unidad') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
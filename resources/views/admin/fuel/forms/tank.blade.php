<div class="form-group">
	{!! Form::label('Nombre') !!}
	<input wire:model="h_nombre" type="text" name="h_nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('h_nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Contenido Actual') !!}
	<input wire:model="h_actual" type="text" name="h_actual" placeholder="Inserte Contenido Actual" class="form-control">
	@error ('h_actual') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Capacidad Máxima') !!}
	<input wire:model="h_total" type="text" name="h_total" placeholder="Inserte Capacidad Máxima" class="form-control">
	@error ('h_total') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
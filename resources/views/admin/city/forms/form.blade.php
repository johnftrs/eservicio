<div class="form-group">
	{!! Form::label('Código') !!}
	<input wire:model="code" type="text" name="code" placeholder="Inserte Nombre" class="form-control">
	@error ('code') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Nombre') !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Coordenda') !!}
	<input wire:model="coordenada" type="text" name="coordenada" placeholder="Inserte Nombre" class="form-control">
	<button type="button" input="coordenada" class="btn btn-min ancho default mapsbtn">Mapa</button>
</div>
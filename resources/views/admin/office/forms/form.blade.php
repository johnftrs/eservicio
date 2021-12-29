<div class="form-group">
	{!! Form::label('Razón Social*','',['class'=>'naranja']) !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control" required>
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('NIT') !!}
	<input wire:model="nit" type="text" name="nit" placeholder="Inserte Nombre" class="form-control">
	@error ('nit') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion" type="text" name="direccion" placeholder="Inserte Nombre" class="form-control">
</div>
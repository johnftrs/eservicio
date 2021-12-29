<div class="form-group">
	{!! Form::label('Code*') !!}
	<input wire:model="code" type="text" name="code" placeholder="Inserte Codigo" class="form-control" required>
	@error ('code') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Label*') !!}
	<input wire:model="label" type="text" name="label" placeholder="Inserte Nombre" class="form-control" required>
	@error ('label') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Icon') !!}
	<input wire:model="icon" type="text" name="icon" placeholder="Inserte Icono" class="form-control" required>
	@error ('icon') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Orden*') !!}
	<input wire:model="orden" type="number" name="orden" placeholder="Inserte Orden" class="form-control" required>
	@error ('orden') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Tamaño') !!}
	<input wire:model="tamanyo" type="number" name="tamanyo" placeholder="Inserte Tamaño" class="form-control" required>
	@error ('tamanyo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>

<div id="fuentes"><?php include('../public/fonts/materialdesignicons-webfont.blade.php'); ?></div>
<script>
	$('#fuentes').on('click','.cont_svg',function() {
		@this.set('icon',$(this).attr('name'));
	});
</script>
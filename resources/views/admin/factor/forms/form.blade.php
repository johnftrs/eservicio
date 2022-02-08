<div class="form-group">
	{!! Form::label('Factor GNV*','',['class'=>'naranja']) !!}
	<input wire:model="factor" type="number" name="factor" placeholder="Inserte Factor GNV" class="form-control">
	@error ('factor') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Fecha Inicial') !!}
	<input wire:model="fecha_inicial" type="date" name="fecha_inicial" placeholder="Inserte Fecha Inicial" class="form-control" required>
	@error ('fecha_inicial') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Fecha Final') !!}
	<input wire:model="fecha_final" type="date" name="fecha_final" placeholder="Inserte Fecha Final" class="form-control" required>
	@error ('fecha_final') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
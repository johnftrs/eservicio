<div class="form-group">
	{!! Form::label('Lectura*','',['class'=>'naranja']) !!}
	<input wire:model="lectura" type="number" name="lectura" placeholder="Inserte Lectura" class="form-control" required>
	@error ('lectura') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Fecha') !!}
	<input wire:model="fecha" type="date" name="fecha" placeholder="Inserte Fecha" class="form-control" required>
	@error ('fecha') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Hora') !!}
	<input wire:model="hora" type="time" name="hora" placeholder="Inserte Hora" class="form-control">
	@error ('hora') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Observaciones') !!}
	<input wire:model="observaciones" type="text" name="observaciones" placeholder="Inserte Observaciones" class="form-control">
	@error ('observaciones') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
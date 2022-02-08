<div class="form-group">
	{!! Form::label('Nombre*','',['class'=>'naranja']) !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control" required>
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Número de Cuenta') !!}
	<input wire:model="cuenta" type="text" name="cuenta" placeholder="Inserte Número de Cuenta" class="form-control">
	@error ('cuenta') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Moneda') !!}
	<select wire:model="moneda" name="moneda" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Bs.">Bs.</option>
	</select>
	@error ('moneda') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Monto en Caja') !!}
	<input wire:model="monto" type="number" name="monto" placeholder="Inserte Monto en Caja" class="form-control">
	@error ('monto') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
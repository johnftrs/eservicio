<div class="form-group">
	{!! Form::label('Nombre*','',['class'=>'naranja']) !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Precio Compra') !!}
	<input wire:model="precio_compra" type="number" name="precio_compra" placeholder="Inserte Precio" class="form-control">
	@error ('precio_compra') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Precio de Venta*','',['class'=>'naranja']) !!}
	<input wire:model="precio_venta" type="number" name="precio_venta" placeholder="Inserte Precio" class="form-control">
	@error ('precio_venta') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Unidad de Medida Combustible') !!}
	<input wire:model="unidad" type="text" name="unidad" placeholder="Inserte Unidad" class="form-control">
	@error ('unidad') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
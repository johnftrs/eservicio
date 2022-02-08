<div class="form-group">
	{!! Form::label('Serie*','',['class'=>'naranja']) !!}
	<input wire:model="serie" type="text" name="serie" placeholder="Inserte Serie" class="form-control">
	@error ('serie') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	<input wire:model="detalle" type="text" name="detalle" placeholder="Inserte Detalles" class="form-control">
	@error ('detalle') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Nombre') !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Sucursal') !!}
	<select wire:model="office_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($offices as $office)
		<option value="{{$office->id}}">{{$office->nombre}} - {{$office->direccion}}</option>
		@endforeach
	</select>
	@error ('office_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
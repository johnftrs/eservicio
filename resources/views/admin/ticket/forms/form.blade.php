<div class="form-group">
	{!! Form::label('Mro. Inicial*','',['class'=>'naranja']) !!}
	<input wire:model="inicio" type="number" name="inicio" placeholder="Inserte Mro. Inicial" class="form-control">
	@error ('inicio') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Mro. Final*','',['class'=>'naranja']) !!}
	<input wire:model="fin" type="number" name="fin" placeholder="Inserte Mro. Final" class="form-control">
	@error ('fin') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Serie*','',['class'=>'naranja']) !!}
	<input wire:model="serie" type="text" name="serie" placeholder="Inserte Serie" class="form-control">
	@error ('serie') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Monto') !!}
	<input wire:model="monto" type="number" name="monto" placeholder="Inserte Monto" class="form-control">
	@error ('monto') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado*','',['class'=>'naranja']) !!}
	<select wire:model="estado" name="estado" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		<option value="Activo">Activo</option>
		<option value="Faltante">Faltante/Falla Imp.</option>
		<option value="Inactivo">Inactivo</option>
		<option value="Extraviado">Extraviado</option>
		<option value="Usado">Usado</option>
		<option value="Registrado">Registrado</option>
	</select>
	@error ('estado') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Cliente') !!}
	<select wire:model="client_id" name="client_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($clients as $client)
		<option value="{{$client->id}}">{{$client->nombre}}</option>
		@endforeach
	</select>
	@error ('client_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	<input wire:model="detalle" type="text" name="detalle" placeholder="Inserte Detalles" class="form-control">
	@error ('detalle') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
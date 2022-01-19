<div class="form-group">
	{!! Form::label('Fecha Compra*','',['class'=>'naranja']) !!}
	<input wire:model="fecha_compra" type="date" name="fecha_compra" placeholder="Inserte Fecha" class="form-control" required>
	@error ('fecha_compra') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Fecha Descarga') !!}
			<input wire:model="fecha_descarga" type="date" name="fecha_descarga" placeholder="Inserte Fecha" class="form-control" required>
			@error ('fecha_descarga') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Hora Descarga') !!}
			<input wire:model="hora_descarga" type="time" name="hora_descarga" placeholder="Inserte Hora Descarga" class="form-control">
			@error ('hora_descarga') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Cantidad*','',['class'=>'naranja']) !!}
	<input wire:model="cantidad" type="number" name="cantidad" placeholder="Inserte Cantidad" class="form-control">
	@error ('cantidad') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nro. Compra Internet') !!}
			<input wire:model="nro_compra" type="text" name="nro_compra" placeholder="Inserte Nro. Compra Internet" class="form-control">
			@error ('nro_compra') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Factura') !!}
			<input wire:model="factura" type="text" name="factura" placeholder="Inserte Factura" class="form-control">
			@error ('factura') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Costo Papelería') !!}
			<input wire:model="papeleria" type="number" name="papeleria" placeholder="Inserte Papelería" class="form-control">
			@error ('papeleria') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Costo Adicional') !!}
			<input wire:model="adicional" type="number" name="adicional" placeholder="Inserte Costo Adicional" class="form-control">
			@error ('adicional') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Cuenta Bancaria*','',['class'=>'naranja']) !!}
	<select wire:model="bank_id" name="bank_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($banks as $bank)
		<option value="{{$bank->id}}">[{{$bank->nombre}}] - {{$bank->cuenta}}</option>
		@endforeach
	</select>
	@error ('bank_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Débito al Banco*','',['class'=>'naranja']) !!}
	<input wire:model="debito_banco" type="text" name="debito_banco" placeholder="Inserte Débito al Banco" class="form-control">
	@error ('debito_banco') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Combustible*','',['class'=>'naranja']) !!}
	<select wire:model="tank_id" name="tank_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($tanks as $tank)
		@if($tank->fuel->unidad == 'L')
		<option value="{{$tank->id}}">[{{$tank->fuel->nombre}}] - {{$tank->nombre}}</option>
		@endif
		@endforeach
	</select>
	@error ('tank_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Vehículo') !!}
			<input wire:model="vehiculo" type="text" name="vehiculo" placeholder="Inserte Vehículo" class="form-control">
			@error ('vehiculo') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Chofer') !!}
			<input wire:model="chofer" type="text" name="chofer" placeholder="Inserte Chofer" class="form-control">
			@error ('chofer') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Responsable') !!}
	<input wire:model="responsable" type="text" name="responsable" placeholder="Inserte Responsable" class="form-control">
	@error ('responsable') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Observaciónes') !!}
	<input wire:model="observaciones" type="text" name="observaciones" placeholder="Inserte Observaciónes" class="form-control">
	@error ('observaciones') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>

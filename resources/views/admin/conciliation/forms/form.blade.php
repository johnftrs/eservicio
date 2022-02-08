<div class="form-group">
	{!! Form::label('Fecha a Consolidar*','',['class'=>'naranja']) !!}
	<input wire:model="fecha" wire:change="get_suma()" type="date" name="fecha" placeholder="Inserte Fecha" class="form-control" required>
	@error ('fecha') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Fecha Depósito') !!}
			<input wire:model="fecha_deposito" type="date" name="fecha_deposito" placeholder="Inserte Fecha Depósito" class="form-control" required>
			@error ('fecha_deposito') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Fecha Registro') !!}
			<input wire:model="fecha_conciliacion" type="date" name="fecha_conciliacion" placeholder="Inserte Fecha Registro" class="form-control" required>
			@error ('fecha_conciliacion') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('Monto Depósito*','',['class'=>'naranja']) !!}
			<input wire:model="deposito" type="number" name="deposito" placeholder="Inserte Monto Depósito" class="form-control">
			@error ('deposito') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Monto en Arqueos') !!}
			<div class="form-control green"><b>Bs. {{number_format($monto, 2, ',', '.')}}</b></div>
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Nro. Depósito') !!}
	<input wire:model="nro_deposito" type="text" name="nro_deposito" placeholder="Inserte Nro. Depósito" class="form-control">
	@error ('nro_deposito') <span class="validacion">*Campo Obligatorio*</span> @enderror
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
	{!! Form::label('Observaciónes') !!}
	<input wire:model="observaciones" type="text" name="observaciones" placeholder="Inserte Observaciónes" class="form-control">
	@error ('observaciones') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>

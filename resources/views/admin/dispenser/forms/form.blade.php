<div class="form-group">
	{!! Form::label('Nombre*','',['class'=>'naranja']) !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombre" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Meter Actual') !!}
	<input wire:model="meter" type="number" name="meter" placeholder="Inserte Meter" class="form-control">
	@error ('meter') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Tanque*','',['class'=>'naranja']) !!}
	<select wire:model="tank_id" name="tank_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($tanks as $tank)
		<option value="{{$tank->id}}">[{{$tank->fuel->nombre}}] - {{$tank->nombre}}</option>
		@endforeach
	</select>
	@error ('tank_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
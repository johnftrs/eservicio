<div class="col-4">
	<div class="col-1">
		<div class="form-group">
			{!! Form::label('Lote*','',['class'=>'naranja']) !!}
			<select wire:model="lot_id" name="lot_id" wire:change="change_lote_cli" class="form-control">
				<option value="">-- Selecciones un Lote --</option>
				@foreach ($lotes as $lts)
				<option value="{{$lts->id}}">{{$lts->serie}} [{{$lts->inicio}} - {{$lts->fin}}]</option>
				@endforeach
			</select>
			@error ('lot_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-3">
		<label>{!!$show_vales!!}</label>
		<br>
		{{--$grupo--}}
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Desde') !!}
			<input wire:model="inicio" readonly="readonly" type="number" name="inicio" placeholder="Inserte Desde" class="form-control">
			@error ('inicio') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			<label><b>Cantidad: </b>{{$cantidad}}</label>
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Hasta*','',['class'=>'naranja']) !!}
	<input wire:model="fin" type="number" wire:change="change_fin" name="fin" placeholder="Inserte Hasta" class="form-control">
	@error ('fin') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Fecha*','',['class'=>'naranja']) !!}
	<input wire:model="fecha" type="date" name="fecha" placeholder="Inserte Fecha" class="form-control" required>
	@error ('fecha') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	<input wire:model="detalle" type="text" name="detalle" placeholder="Inserte Detalles" class="form-control">
	@error ('detalle') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<br>
<div class="form-group">
	{!! Form::label('Fecha*','',['class'=>'naranja']) !!}
	<input wire:model="fecha" type="text" name="fecha" placeholder="Inserte Fecha" class="form-control datepicker" required>
	@error ('fecha') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Turno*','',['class'=>'naranja']) !!}
	<select wire:model="turn_id" name="turn_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($turns as $turn)
		<option value="{{$turn->id}}">{{$turn->nombre}}</option>
		@endforeach
	</select>
	@error ('turn_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="separadorNota"><span>VALES</span></div>
<div class="col-4">
	@foreach($tickets_list as $k=>$ticket)
	<div class="dispensers_list">
		<label for="ticket_{{ $ticket->id }}">Vale {{$ticket->codigo}}{{$ticket->serie}}</label>
		<input wire:model="tickets.{{$ticket->id}}" type="checkbox" id="ticket_{{ $ticket->id }}" value="{{ $ticket->id }}">
		<label for="ticket_{{ $ticket->id }}">:${{number_format($ticket->monto, 2, ',', '.')}}</label>
	</div>
	@endforeach
</div>
<br><br>
<div class="separadorNota"><span>DISPENSERS</span></div>
<div class="col-4">
	@foreach($dispensers_list as $k=>$dispenser)
	<div class="dispensers_list">
		<label for="dispenser_{{ $dispenser->id }}">{{ $dispenser->nombre }}</label>
		<input wire:model="dispensers.{{$dispenser->id}}" type="checkbox" id="dispenser_{{ $dispenser->id }}" value="{{ $dispenser->id }}">
	</div>
	@endforeach
</div>
<br>
<br>
@if($dispensers)
<?php $suma_sub=0; ?>
@foreach($dispensers_list as $k=>$dispenser)
@if(isset($dispensers[$dispenser->id]))
@if($dispensers[$dispenser->id])
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			<label>{!!'['.$dispenser->fuel->nombre.']&nbsp;&nbsp;'.$dispenser->nombre.' - Meter Inicial:'!!}</label>
			&nbsp;&nbsp;
			{!! Form::label($dispenser->meter,'',['class'=>'naranja']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="col-2-3">
			<div class="form-group">
				<input wire:model="meters.{{$dispenser->id}}" type="number" name="meters.{{$dispenser->id}}" placeholder="Meter Final" class="form-control" required>
				@error ('meters') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
		</div>
		<div class="col-1-3">
			@if(isset($meters[$dispenser->id]))
			@if($meters[$dispenser->id]!='')
			<?php $sub_total = ($meters[$dispenser->id]-$dispenser->meter)*$dispenser->fuel->precio_venta; $suma_sub += $sub_total; ?>
			Bs. {{ number_format($sub_total, 2, ',', '.') }}
			@endif
			@endif
		</div>
	</div>
</div>
@endif
@endif
@endforeach
<div class="col-4">
	<div class="col-2"></div>
	<div class="col-2">
		<div class="col-2-3"></div>
		<div class="col-1-3">
			<b>Bs. {{number_format($suma_sub, 2, ',', '.')}}</b>
		</div>
	</div>
</div>
@endif
<div class="separadorNota"><span>BILLETAJE</span></div>
<div class="col-4">
	<div class="col-2">
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Bs. 200') !!}
				<input wire:model="_200" type="number" name="_200" class="form-control">
			</div>
		</div>
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Bs. 100') !!}
				<input wire:model="_100" type="number" name="_100" class="form-control">
			</div>
		</div>
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Bs. 50') !!}
				<input wire:model="_50" type="number" name="_50" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-2">
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Bs. 20') !!}
				<input wire:model="_20" type="number" name="_20" class="form-control">
			</div>
		</div>
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Bs. 10') !!}
				<input wire:model="_10" type="number" name="_10" class="form-control">
			</div>
		</div>
		<div class="col-1-3">
			<div class="form-group">
				{!! Form::label('Total Monedas') !!}
				<input wire:model="monedas" type="number" name="monedas" class="form-control">
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Monto en Tarjeta') !!}
	<input wire:model="tarjeta" type="number" name="tarjeta" class="form-control">
</div>
<br>
<div class="separadorNota"><span>CALIBRACIÓN</span></div>
<div class="col-4">
	<div class="form-group">
		{!! Form::label('Calibración') !!}
		<input wire:model="calibracion" type="number" name="calibracion" placeholder="Bs." class="form-control">
		@error ('calibracion') <span class="validacion">*Campo Obligatorio*</span> @enderror
	</div>
</div>
<br><br><br>
<script>
	$('body').on('change','input.datepicker',function() {
		@this.set('fecha',$(this).val());
	});
</script>
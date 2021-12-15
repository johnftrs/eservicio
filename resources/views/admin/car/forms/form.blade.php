<div class="form-group">
	{!! Form::label('Asegurado') !!}
	{!! Form::text('asegurado',$car->asegurado ?? null,['class'=>'form-control','placeholder'=>'Inserte asegurado', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Tipo') !!}
	{!! Form::text('tipo',$car->tipo ?? null,['class'=>'form-control','placeholder'=>'Inserte tipo', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Placa') !!}
	{!! Form::text('placa',$car->placa ?? null,['class'=>'form-control','placeholder'=>'Inserte placa', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Anyo') !!}
	{!! Form::text('anyo',$car->anyo ?? null,['class'=>'form-control','placeholder'=>'Inserte anyo', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Color') !!}
	{!! Form::text('color',$car->color ?? null,['class'=>'form-control','placeholder'=>'Inserte color', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Marca') !!}
	{!! Form::text('marca',$car->marca ?? null,['class'=>'form-control','placeholder'=>'Inserte marca', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Modelo') !!}
	{!! Form::text('modelo',$car->modelo ?? null,['class'=>'form-control','placeholder'=>'Inserte modelo', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	{!! Form::text('detalles',$car->detalles ?? null,['class'=>'form-control','placeholder'=>'Inserte detalles', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Cliente') !!}
	{!! Form::select('client_id', $clients, $car->client_id ?? ($client_id ?? null), ['class'=>'form-control']) !!}
</div>
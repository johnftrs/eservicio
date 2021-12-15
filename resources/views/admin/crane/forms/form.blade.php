<div class="form-group">
	{!! Form::label('Código*') !!}
	{!! Form::text('codigo',$crane->codigo ?? null,['class'=>'form-control','placeholder'=>'Insert codigo','required', 'maxlength'=>10]) !!}
</div>
<div class="form-group">
	{!! Form::label('Modelo') !!}
	{!! Form::text('modelo',$crane->modelo ?? null,['class'=>'form-control','placeholder'=>'Insert Modelo', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Placa') !!}
	{!! Form::text('placa',$crane->placa ?? null,['class'=>'form-control','placeholder'=>'Insert Placa', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Chofer') !!}
	{!! Form::text('chofer',$crane->chofer ?? null,['class'=>'form-control','placeholder'=>'Insert Chofer', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Color') !!}
	{!! Form::text('color',$crane->color ?? null,['class'=>'form-control','placeholder'=>'Insert Color', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	{!! Form::text('detalles',$crane->detalles ?? null,['class'=>'form-control','placeholder'=>'Insert Detalles', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Codigo*') !!}
	{!! Form::text('codigo',$insurance->codigo ?? null,['class'=>'form-control','placeholder'=>'Insert Codigo','required', 'maxlength'=>20]) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre*') !!}
	{!! Form::text('nombre',$insurance->nombre ?? null,['class'=>'form-control','placeholder'=>'Insert Nombre','required', 'maxlength'=>191]) !!}
</div>
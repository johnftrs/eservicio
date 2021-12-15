<div class="form-group">
	{!! Form::label('Code*') !!}
	{!! Form::text('codigo',$type->codigo ?? null,['class'=>'form-control','placeholder'=>'Insert Code','required', 'maxlength'=>20]) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre*') !!}
	{!! Form::text('nombre',$type->nombre ?? null,['class'=>'form-control capitalizado','placeholder'=>'Insert Nombre','required', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Categoría') !!}
	{!! Form::text('categoria',$type->categoria ?? null,['class'=>'form-control','placeholder'=>'Insert Categoría', 'maxlength'=>100]) !!}
</div>
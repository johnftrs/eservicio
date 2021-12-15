<div class="form-group">
	{!! Form::label('Código') !!}
	{!! Form::text('code',$category->code ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Codigo','required', 'maxlength'=>10]) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$category->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Insert Nombre','required', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Grupo*') !!}
	{!! Form::select('group_id', $groups, $category->group_id ?? null, ['class'=>'form-control']) !!}
</div>
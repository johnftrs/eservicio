<div class="form-group">
	{!! Form::label('Código') !!}
	{!! Form::text('code',$group->code ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Codigo','required', 'maxlength'=>5]) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$group->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Nombre','required', 'maxlength'=>20]) !!}
</div>

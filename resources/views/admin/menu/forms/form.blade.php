<div class="form-group">
	{!! Form::label('Code*') !!}
	{!! Form::text('code',$menu->code ?? null,['class'=>'form-control','placeholder'=>'Insert Code','required', 'maxlength'=>10]) !!}
</div>
<div class="form-group">
	{!! Form::label('Label*') !!}
	{!! Form::text('label',$menu->label ?? null,['class'=>'form-control','placeholder'=>'Insert Label','required', 'maxlength'=>20]) !!}
</div>
<div class="form-group">
	{!! Form::label('Icon') !!}
	{!! Form::text('icon',$menu->icon ?? null,['class'=>'form-control','placeholder'=>'Insert Icon','maxlength'=>50]) !!}
</div>
<div class="form-group">
	{!! Form::label('Orden*') !!}
	{!! Form::number('orden',$menu->orden ?? null,['class'=>'form-control','placeholder'=>'Insert Orden','required','autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Code*') !!}
	{!! Form::text('code',$functionality->code ?? null,['class'=>'form-control','placeholder'=>'Insert Code','required', 'maxlength'=>10]) !!}
</div>
<div class="form-group">
	{!! Form::label('Label*') !!}
	{!! Form::text('label',$functionality->label ?? null,['class'=>'form-control','placeholder'=>'Insert Label','required', 'maxlength'=>20]) !!}
</div>
<div class="form-group">
	{!! Form::label('Path*') !!}
	{!! Form::text('path',$functionality->path ?? null,['class'=>'form-control','placeholder'=>'admin/function/create','required', 'maxlength'=>50]) !!}
</div>
<div class="form-group">
	{!! Form::label('mostrar_id','Mostrar en Menu') !!}
	<input type="checkbox" class="check" id="mostrar_id" name="mostrar" @if(isset($functionality->mostrar))  {{$functionality->mostrar?'checked':''}} @endif value="{{true}}" style="width:70px;height:35px;">
</div>
<div class="form-group">
	{!! Form::label('Menu*') !!}
	{!! Form::select('menu_id', $menus, $functionality->menu_id ?? null, ['class'=>'form-control','required','data-live-search'=>"true" ]) !!}
</div>
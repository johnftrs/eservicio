<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('razon_social',$office->razon_social ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Nombre','required', 'maxlength'=>100]) !!}
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	{!! Form::text('direccion',$office->direccion ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Dirección','required', 'maxlength'=>191]) !!}
</div>
<div class="form-group">
	{!! Form::label('Coordenada GPS') !!}
	{!! Form::text('coordenada',$office->coordenada ?? null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off']) !!}
	<button type="button" input="coordenada" class="btn btn-min ancho default mapsbtn">Mapa</button>
</div>
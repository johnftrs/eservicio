<div class="form-group">
	{!! Form::label('Código') !!}
	{!! Form::text('code',$city->code ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Codigo','required', 'maxlength'=>5]) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$city->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Nombre','required', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
	{!! Form::label('Coordenda') !!}
	{!! Form::text('coordenada',$city->coordenada ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Coordenada', 'maxlength'=>255]) !!}
	<button type="button" input="coordenada" class="btn btn-min ancho default mapsbtn">Mapa</button>
</div>
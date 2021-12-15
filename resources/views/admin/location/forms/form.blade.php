<div class="form-group">
	{!! Form::label('Nombre*') !!}
	{!! Form::text('nombre',$location->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Nombre','required', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Coordenada GPS') !!}
	{!! Form::text('coordenada',$location->coordenada ?? null,['class'=>'form-control','placeholder'=>'Inserte Coordenada', 'maxlength'=>255,'autocomplete'=>'off']) !!}
	<button type="button" input="coordenada" class="btn btn-min ancho default mapsbtn">Mapa</button>
</div>
<div class="form-group">
	{!! Form::label('Ciudad*') !!}
	{!! Form::select('city_id', $cities, $location->city_id ?? null, ['class'=>'form-control']) !!}
</div>
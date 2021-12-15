<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$client->nombre ?? null,['class'=>'form-control','placeholder'=>'Inserte Nombre','required', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Nit') !!}
	{!! Form::text('nit',$client->nit ?? null,['class'=>'form-control','placeholder'=>'Inserte Nit', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Telefono') !!}
	{!! Form::text('telefono',$client->telefono ?? null,['class'=>'form-control','placeholder'=>'Inserte Telefono', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Telefono 2') !!}
	{!! Form::text('telefono2',$client->telefono2 ?? null,['class'=>'form-control','placeholder'=>'Inserte Telefono 2', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Correo') !!}
	{!! Form::text('correo',$client->correo ?? null,['class'=>'form-control','placeholder'=>'Inserte Correo', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	{!! Form::text('direccion',$client->direccion ?? null,['class'=>'form-control','placeholder'=>'Inserte Dirección', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Categoría') !!}
	{!! Form::text('categoria',$client->categoria ?? null,['class'=>'form-control','placeholder'=>'Inserte Categoría', 'maxlength'=>191,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Coordenda') !!}
	{!! Form::text('coordenada',$client->coordenada ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Coordenada', 'maxlength'=>255]) !!}
	<button type="button" input="coordenada" class="btn btn-min ancho default mapsbtn">Mapa</button>
</div>
<div class="form-group">
	{!! Form::label('Ciudad') !!}
	{!! Form::select('city_id', $cities, $client->city_id ?? null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('Localidad') !!}
	{!! Form::select('location_id', $locations, $client->location_id ?? null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('Oficina') !!}
	{!! Form::select('office_id', $offices, $client->office_id ?? null, ['class'=>'form-control']) !!}
</div>
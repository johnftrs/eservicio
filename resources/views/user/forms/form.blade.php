<div class="form-group">
	{!! Form::label('Usuario') !!}
	{!! Form::text('name',$user->name ?? null,['class'=>'form-control','placeholder'=>'Inserte Usuario','required', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Contraseña') !!}
	{!! Form::text('password',null,['class'=>'form-control','placeholder'=>'Inserte Contraseña', 'maxlength'=>60,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Correo') !!}
	{!! Form::text('email',$user->email ?? null,['class'=>'form-control','placeholder'=>'Inserte Email','maxlength'=>200,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Rol') !!}
	{!! Form::select('role_id', $roles, $user->role_id ?? null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre Completo') !!}
	{!! Form::text('nombre',$user->people->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Nombre Completo', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('C.I.') !!}
	{!! Form::text('ci',$user->people->ci ?? null,['class'=>'form-control','placeholder'=>'Inserte CI', 'maxlength'=>20,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	{!! Form::text('direccion',$user->people->direccion ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Direccion', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Telefono') !!}
	{!! Form::text('telefono',$user->people->telefono ?? null,['class'=>'form-control','placeholder'=>'Inserte Telefono', 'maxlength'=>100,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Localidad') !!}
	{!! Form::select('location_id', $locations, $user->people->location_id ?? null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('Ciudad') !!}
	{!! Form::select('city_id', $cities, $user->people->city_id ?? null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('Oficina') !!}
	{!! Form::select('office_id', $offices, $user->people->office_id ?? null, ['class'=>'form-control']) !!}
</div>
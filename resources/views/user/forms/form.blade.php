<div class="form-group">
	{!! Form::label('Usuario') !!}
	<input wire:model="name" type="text" name="name" placeholder="Inserte Usuario" class="form-control" autocomplete="off">
	@error ('name') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Contraseña') !!}
	<input wire:model="password" type="password" name="password" placeholder="Inserte Contraseña" class="form-control" autocomplete="off">
	@error ('password') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Correo') !!}
	<input wire:model="email" type="text" name="email" placeholder="Inserte Correo" class="form-control" autocomplete="off">
	@error ('email') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Rol') !!}
	<select wire:model="role_id" name="role_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($roles as $role)
		<option value="{{$role->id}}">{{$role->name}}</option>
		@endforeach
	</select>
	@error ('role_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Nombres') !!}
	<input wire:model="nombre" type="text" name="nombre" placeholder="Inserte Nombres" class="form-control">
	@error ('nombre') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Apellido Paterno') !!}
	<input wire:model="paterno" type="text" name="paterno" placeholder="Inserte Apellido Paterno" class="form-control">
	@error ('paterno') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Apellido Materno') !!}
	<input wire:model="materno" type="text" name="materno" placeholder="Inserte Apellido Materno" class="form-control">
	@error ('materno') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('C.I.') !!}
	<input wire:model="ci" type="text" name="ci" placeholder="Inserte CI" class="form-control">
	@error ('ci') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion" type="text" name="direccion" placeholder="Inserte Direccion" class="form-control">
	@error ('direccion') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Telefono') !!}
	<input wire:model="telefono" type="text" name="telefono" placeholder="Inserte Telefono" class="form-control">
	@error ('telefono') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Fecha de Nacimiento') !!}
	<input wire:model="fecha_nacimiento" type="text" name="fecha_nacimiento" placeholder="Inserte Fecha de Nacimiento" class="form-control">
	@error ('fecha_nacimiento') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Fecha Ingreso') !!}
	<input wire:model="fecha_ingreso" type="text" name="fecha_ingreso" placeholder="Inserte Fecha Ingreso" class="form-control">
	@error ('fecha_ingreso') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Nivel de Estudio') !!}
	<input wire:model="nivel_estudio" type="text" name="nivel_estudio" placeholder="Inserte Nivel de Estudio" class="form-control">
	@error ('nivel_estudio') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Biométrico') !!}
	<input wire:model="biometrico" type="text" name="biometrico" placeholder="Inserte Biométrico" class="form-control">
	@error ('biometrico') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Estado Civil') !!}
	<input wire:model="estado_civil" type="text" name="estado_civil" placeholder="Inserte Estado Civil" class="form-control">
	@error ('estado_civil') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('AFP') !!}
	<input wire:model="afp" type="text" name="afp" placeholder="Inserte AFP" class="form-control">
	@error ('afp') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Nombre del Garante') !!}
	<input wire:model="nombre_garante" type="text" name="nombre_garante" placeholder="Inserte Nombre del Garante" class="form-control">
	@error ('nombre_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Parentezco con el Garante') !!}
	<input wire:model="relacion_garante" type="text" name="relacion_garante" placeholder="Inserte Parentezco con el Garante" class="form-control">
	@error ('relacion_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Telefono Garante') !!}
	<input wire:model="telefono_garante" type="text" name="telefono_garante" placeholder="Inserte Telefono Garante" class="form-control">
	@error ('telefono_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Trabajo Garante') !!}
	<input wire:model="trabajo_garante" type="text" name="trabajo_garante" placeholder="Inserte Trabajo Garante" class="form-control">
	@error ('trabajo_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Direccion del Garante') !!}
	<input wire:model="direccion_garante" type="text" name="direccion_garante" placeholder="Inserte Direccion del Garante" class="form-control">
	@error ('direccion_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Referencia Personal Nombre') !!}
	<input wire:model="telefono" type="text" name="telefono" placeholder="Inserte Referencia Personal Nombre" class="form-control">
	@error ('telefono') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Parentezco con Referencia') !!}
	<input wire:model="relacion_referencia_personal" type="text" name="relacion_referencia_personal" placeholder="Inserte Parentezco con Referencia" class="form-control">
	@error ('relacion_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Telefono Referencia') !!}
	<input wire:model="telefono_referencia_personal" type="text" name="telefono_referencia_personal" placeholder="Inserte Telefono Referencia" class="form-control">
	@error ('telefono_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Trabajo Referencia') !!}
	<input wire:model="trabajo_referencia_personal" type="text" name="trabajo_referencia_personal" placeholder="Inserte Trabajo Referencia" class="form-control">
	@error ('trabajo_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Direccion Referencia Personal') !!}
	<input wire:model="direccion_referencia_personal" type="text" name="direccion_referencia_personal" placeholder="Inserte Direccion Referencia Personal" class="form-control">
	@error ('direccion_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Localidad') !!}
	<select wire:model="location_id" name="location_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($locations as $location)
		<option value="{{$location->id}}">{{$location->nombre}}</option>
		@endforeach
	</select>
	@error ('location_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Ciudad') !!}
	<select wire:model="city_id" name="city_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($cities as $city)
		<option value="{{$city->id}}">{{$city->nombre}}</option>
		@endforeach
	</select>
	@error ('city_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Sucursal') !!}
	<select wire:model="office_id" name="office_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($offices as $office)
		<option value="{{$office->id}}">{{$office->nombre}}</option>
		@endforeach
	</select>
	@error ('office_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<br>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Usuario*','',['class'=>'naranja']) !!}
			<input wire:model="name" type="text" name="name" placeholder="Inserte Usuario" class="form-control" autocomplete="off">
			@error ('name') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Contraseña*','',['class'=>'naranja']) !!}
			<input wire:model="password" type="password" name="password" placeholder="Inserte Contraseña" class="form-control" autocomplete="off">
			@error ('password') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Correo') !!}
			<input wire:model="email" type="text" name="email" placeholder="Inserte Correo" class="form-control" autocomplete="off">
			@error ('email') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Rol*','',['class'=>'naranja']) !!}
			<select wire:model="role_id" name="role_id" class="form-control">
				<option value="">-- Seleccione una opción --</option>
				@foreach ($roles as $role)
				<option value="{{$role->id}}">{{$role->name}}</option>
				@endforeach
			</select>
			@error ('role_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<br>
<div class="form-group">
	{!! Form::label('Fotografía') !!}
	<input wire:model="foto" type="file" name="foto">
	@if ($foto)
	<img height="50px" src="{{ $foto->temporaryUrl() }}">
	@endif
	<div wire:loading wire:target="foto">Cargando...</div>
	@error ('foto') <span class="validacion">*Foto no puede ser mayor a 15MB*</span> @enderror
</div>
<br>
<div class="form-group">
	{!! Form::label('Nombre Completo') !!}
	<input wire:model="nombre_completo" type="text" name="nombre_completo" placeholder="Inserte Nombres" class="form-control">
	@error ('nombre_completo') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('C.I.') !!}
			<input wire:model="ci" type="text" name="ci" placeholder="Inserte CI" class="form-control">
			@error ('ci') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Fecha de Nacimiento') !!}
			<input wire:model="fecha_nacimiento" type="date" name="fecha_nacimiento" placeholder="Inserte Fecha de Nacimiento" class="form-control">
			@error ('fecha_nacimiento') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Telefono') !!}
			<input wire:model="telefono" type="text" name="telefono" placeholder="Inserte Telefono" class="form-control">
			@error ('telefono') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('2do Telefono') !!}
			<input wire:model="telefono2" type="text" name="telefono2" placeholder="Inserte Telefono" class="form-control">
			@error ('telefono2') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion" type="text" name="direccion" placeholder="Inserte Direccion" class="form-control">
	@error ('direccion') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Zona') !!}
			<input wire:model="zona" type="text" name="zona" placeholder="Inserte Zona" class="form-control">
			@error ('zona') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Grado de Estudio') !!}
			<input wire:model="nivel_estudio" type="text" name="nivel_estudio" placeholder="Inserte Grado de Estudio" class="form-control">
			@error ('nivel_estudio') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Estado Civil') !!}
			<input wire:model="estado_civil" type="text" name="estado_civil" placeholder="Inserte Estado Civil" class="form-control">
			@error ('estado_civil') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Hijos') !!}
			<input wire:model="hijos" type="number" name="hijos" placeholder="Inserte Hijos" class="form-control">
			@error ('hijos') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="separadorNota"><span>EXPERIENCIA LABORAL</span></div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Empresa') !!}
			<input wire:model="ex_empresa" type="text" name="ex_empresa" placeholder="Inserte Empresa" class="form-control">
			@error ('ex_empresa') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Cargo') !!}
			<input wire:model="ex_cargo" type="text" name="ex_cargo" placeholder="Inserte Cargo" class="form-control">
			@error ('ex_cargo') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Tiempo Trabajó') !!}
			<input wire:model="ex_tiempo" type="text" name="ex_tiempo" placeholder="Inserte Tiempo Trabajó" class="form-control">
			@error ('ex_tiempo') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nombre Jefe') !!}
			<input wire:model="ex_jefe" type="text" name="ex_jefe" placeholder="Inserte Nombre Jefe" class="form-control">
			@error ('ex_jefe') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Motivo Renuncia') !!}
			<input wire:model="ex_renuncia" type="text" name="ex_renuncia" placeholder="Inserte Motivo Renuncia" class="form-control">
			@error ('ex_renuncia') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Observaciónes') !!}
			<input wire:model="ex_observaciones" type="text" name="ex_observaciones" placeholder="Inserte Observaciónes" class="form-control">
			@error ('ex_observaciones') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="separadorNota"><span>DATOS SISTEMA</span></div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Fecha Ingreso') !!}
			<input wire:model="fecha_ingreso" type="date" name="fecha_ingreso" placeholder="Inserte Fecha Ingreso" class="form-control">
			@error ('fecha_ingreso') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Fecha Retiro') !!}
			<input wire:model="fecha_retiro" type="date" name="fecha_retiro" placeholder="Inserte Fecha Retiro" class="form-control">
			@error ('fecha_retiro') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Casillero') !!}
			<input wire:model="casillero" type="text" name="casillero" placeholder="Inserte Casillero" class="form-control">
			@error ('casillero') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Usuario SIGES') !!}
			<input wire:model="siges" type="text" name="siges" placeholder="Inserte Usuario SIGES" class="form-control">
			@error ('siges') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Biométrico') !!}
			<input wire:model="biometrico" type="number" name="biometrico" placeholder="Inserte Biométrico" class="form-control">
			@error ('biometrico') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Usuario Softcontrol') !!}
			<input wire:model="softcontrol" type="text" name="softcontrol" placeholder="Inserte Usuario Softcontrol" class="form-control">
			@error ('softcontrol') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Cuenta BMSC') !!}
			<input wire:model="cuenta_bmsc" type="text" name="cuenta_bmsc" placeholder="Inserte Cuenta BMSC" class="form-control">
			@error ('cuenta_bmsc') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('AFP') !!}
			<input wire:model="afp" type="text" name="afp" placeholder="Inserte AFP" class="form-control">
			@error ('afp') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="separadorNota"><span>DATOS GARANTE</span></div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nombre') !!}
			<input wire:model="nombre_garante" type="text" name="nombre_garante" placeholder="Inserte Nombre" class="form-control">
			@error ('nombre_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Parentezco') !!}
			<input wire:model="relacion_garante" type="text" name="relacion_garante" placeholder="Inserte Parentezco" class="form-control">
			@error ('relacion_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Telefono') !!}
			<input wire:model="telefono_garante" type="text" name="telefono_garante" placeholder="Inserte Telefono" class="form-control">
			@error ('telefono_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Trabajo') !!}
			<input wire:model="trabajo_garante" type="text" name="trabajo_garante" placeholder="Inserte Trabajo" class="form-control">
			@error ('trabajo_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	<input wire:model="direccion_garante" type="text" name="direccion_garante" placeholder="Inserte Dirección" class="form-control">
	@error ('direccion_garante') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="separadorNota"><span>REFERENCIA PERSONAL</span></div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Nombre') !!}
			<input wire:model="nombre_referencia_personal" type="text" name="nombre_referencia_personal" placeholder="Inserte Nombre" class="form-control">
			@error ('nombre_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Parentezco') !!}
			<input wire:model="relacion_referencia_personal" type="text" name="relacion_referencia_personal" placeholder="Inserte Parentezco" class="form-control">
			@error ('relacion_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="col-4">
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Telefono') !!}
			<input wire:model="telefono_referencia_personal" type="text" name="telefono_referencia_personal" placeholder="Inserte Telefono" class="form-control">
			@error ('telefono_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('Ocupación') !!}
			<input wire:model="trabajo_referencia_personal" type="text" name="trabajo_referencia_personal" placeholder="Inserte Ocupación" class="form-control">
			@error ('trabajo_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('Direccion') !!}
	<input wire:model="direccion_referencia_personal" type="text" name="direccion_referencia_personal" placeholder="Inserte Direccion" class="form-control">
	@error ('direccion_referencia_personal') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
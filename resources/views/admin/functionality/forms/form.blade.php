<div class="form-group">
	{!! Form::label('Code*') !!}
	<input wire:model="code" type="text" name="code" placeholder="Inserte Nombre" class="form-control">
	@error ('code') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Label*') !!}
	<input wire:model="label" type="text" name="label" placeholder="Inserte Nombre" class="form-control">
	@error ('label') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Path*') !!}
	<input wire:model="path" type="text" name="path" placeholder="Inserte Nombre" class="form-control">
	@error ('path') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('mostrar_id','Mostrar en Menu') !!}
	<input wire:model="mostrar" type="checkbox" class="check" id="mostrar_id" name="mostrar" @if(isset($functionality->mostrar))  {{$functionality->mostrar?'checked':''}} @endif value="{{true}}" style="width:70px;height:35px;">
</div>
<div class="form-group">
	{!! Form::label('Menu*') !!}
	<select wire:model="menu_id" class="form-control">
		<option value="">-- Seleccione una opción --</option>
		@foreach ($menus as $menu)
		<option value="{{$menu->id}}">{{$menu->label}}</option>
		@endforeach
	</select>
	@error ('menu_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
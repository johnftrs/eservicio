<div class="card">
	@include('alerts.error')
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='ECLI'){ $editar=true; }
		if ($func->code=='DCLI'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title">Combustibles</h5>
		<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Nombre</th>
					<th>Unidad</th>
					<th>Precio</th>
					<th class="centrado">Tanques</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($fuels as $fuel)
					<tr>
						<td>{{$fuel->nombre}}</td>
						<td>{{$fuel->unidad}}</td>
						<td>Bs. {{$fuel->precio}}</td>
						<td class="centrado">
							<button class="btn btn-min info" wire:click="tanques({{$fuel->id}})"><i class="mdi mdi-fuel"></i>Tanques</button>
						</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$fuel->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select({{$fuel->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@if( $modal )
	<div class="modal-dialog panel primary visible">
		<div class="panel-heading">
			<h4 class="panel-title">
				@if($clase == 'tank')
				<b style="color: white;">Registro de Tanques</b>
				@else
				<b style="color: white;">Registro de Combustibles</b>
				@endif
			</h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@if($clase == 'tank')
			@include('admin.fuel.forms.tank')
			@else
			@include('admin.fuel.forms.form')
			@endif
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($accion=='store')
			@if($clase == 'tank')
			<button wire:click="h_store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@else
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@endif
			@else
			@if($clase == 'tank')
			<button wire:click="h_update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
			@else
			<button wire:click="update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
			@endif
			@endif
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
	@if( $delete )
	<div class="modal-alert">
		<div>
			<span>Seguro que desea eliminar este registro?</span>
			@if($clase == 'tank')
			<button type="button" wire:click="h_destroy()" class="btn danger">Eliminar</button>
			@else
			<button type="button" wire:click="destroy()" class="btn danger">Eliminar</button>
			@endif
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
	@if( $page )
	@include('admin.fuel.forms.tanques')
	@endif
</div>
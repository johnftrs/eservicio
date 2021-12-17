<div class="card">
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='ECLI'){ $editar=true; }
		if ($func->code=='DCLI'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title">Clientes</h5>
		<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Nombre</th>
					<th>Nit</th>
					<th>Dirección</th>
					<th class="centrado">Telefono</th>
					<th class="centrado">Telefono 2</th>
					<th class="centrado">Localidad</th>
					<th class="centrado">Cardex</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($clients as $client)
					<tr>
						<td>{{$client->nombre}}</td>
						<td>{{$client->nit}}</td>
						<td>{{$client->direccion}}</td>
						<td class="centrado">{{$client->telefono}}</td>
						<td class="centrado">{{$client->telefono2}}</td>
						<td class="centrado">{{$client->location->nombre}}</td>
						<td class="centrado">
							<button class="btn btn-min info" wire:click.escape="openPage({{$client->id}})"><i class="mdi mdi-clipboard-text"></i>Cardex</button>
						</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$client->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select({{$client->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
				@if($clase == 'driver')
				<b style="color: white;">Registro de Choferes</b>
				@elseif($clase == 'vehicle')
				<b style="color: white;">Registro de Vehículos</b>
				@else
				<b style="color: white;">Registro de Clientes</b>
				@endif
			</h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@if($clase == 'driver')
			@include('admin.client.forms.driver')
			@elseif($clase == 'vehicle')
			@include('admin.client.forms.vehicle')
			@else
			@include('admin.client.forms.form')
			@endif
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($accion=='store')
			@if($clase == 'driver')
			<button wire:click="d_store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@elseif($clase == 'vehicle')
			<button wire:click="v_store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@else
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@endif
			@else
			@if($clase == 'driver')
			<button wire:click="d_update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
			@elseif($clase == 'vehicle')
			<button wire:click="v_update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
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
			@if($clase == 'driver')
			<button type="button" wire:click="d_destroy()" class="btn danger">Eliminar</button>
			@elseif($clase == 'vehicle')
			<button type="button" wire:click="v_destroy()" class="btn danger">Eliminar</button>
			@else
			<button type="button" wire:click="destroy()" class="btn danger">Eliminar</button>
			@endif
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
	@if( $page )
	@include('admin.client.forms.kardex')
	@endif
</div>
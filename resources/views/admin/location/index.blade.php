<div class="card">
	@include('alerts.error')
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='ELOC'){ $editar=true; }
		if ($func->code=='DLOC'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title">Localidades</h5>
		<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>
	</div>
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
			</div>
			<div id="filtro">
				<input type="search" placeholder="Filtro:">
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Ubicación</th>
						<th>Ciudad</th>
						<th>Coordenada</th>
						@if ($editar)<th>Editar</th>@endif
						@if ($eliminar)<th>Borrar</th>@endif
					</thead>
					<tbody>
						@foreach($locations as $location)
						<tr>
							<td>{{$location->nombre}}</td>
							<td>{{$location->city->nombre}}</td>
							<td class="f12">{{$location->coordenada}}</td>
							@if ($editar)
							<td class="centrado">
								<button class="btn btn-min warning" wire:click="edit({{$location->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
							</td>
							@endif
							@if ($eliminar)
							<td class="centrado">
								<button type="button" wire:click="select({{$location->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@if( $modal )
	<div class="modal-dialog panel primary visible">
		<div class="panel-heading">
			<h4 class="panel-title"><b style="color: white;">Registro de Localidades</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@include('admin.location.forms.form')
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($accion=='store')
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@else
			<button wire:click="update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
			@endif
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
	@if( $delete )
	<div class="modal-alert">
		<div>
			<span>Seguro que desea eliminar este registro?</span>
			<button type="button" wire:click="destroy()" class="btn danger">Eliminar</button>
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
</div>
<div class="card">
	@include('alerts.error')
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='ECLI'){ $editar=true; }
		if ($func->code=='DCLI'){ $eliminar=true; }
	} ?>
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-gas-station"></i>Dispensers</h5>
		<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Nombre</th>
					<th>Meter Actual</th>
					<th class="centrado">Combustible</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($dispensers as $dispenser)
					<tr>
						<td>{{$dispenser->nombre}}</td>
						<td>{{number_format($dispenser->meter, 2, ',', '.')}}</td>
						<td class="centrado">{{$dispenser->fuel->nombre}} - {{$dispenser->tank->nombre}}</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$dispenser->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select({{$dispenser->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
				@if($clase == 'hosepipe')
				<b style="color: white;">Registro de Mangueras</b>
				@else
				<b style="color: white;">Registro de Dispensers</b>
				@endif
			</h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@if($clase == 'hosepipe')
			@include('admin.dispenser.forms.hosepipe')
			@else
			@include('admin.dispenser.forms.form')
			@endif
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($accion=='store')
			@if($clase == 'hosepipe')
			<button wire:click="h_store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@else
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@endif
			@else
			@if($clase == 'hosepipe')
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
			@if($clase == 'hosepipe')
			<button type="button" wire:click="h_destroy()" class="btn danger">Eliminar</button>
			@else
			<button type="button" wire:click="destroy()" class="btn danger">Eliminar</button>
			@endif
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
	@if( $page )
	@include('admin.dispenser.forms.mangueras')
	@endif
</div>
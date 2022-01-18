<div class="card">
	<?php $crear=false; $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='CTIC'){ $crear=true; }
		if ($func->code=='ETIC'){ $editar=true; }
		if ($func->code=='DTIC'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-ticket-confirmation"></i>Vales</h5>
		{{--<button class="btn btn-min default" wire:click="activar"><i class="mdi mdi-check"></i>Usar Vale</button>--}}
		@if ($crear)<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>@endif
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Codigo</th>
					<th>Monto</th>
					<th>Estado</th>
					<th>Fecha Uso</th>
					<th>Conductor</th>
					<th>Vehículo</th>
					<th>Dispenser</th>
					<th>Detalles</th>
					<th class="centrado">Usuario</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($tickets as $ticket)
					<tr class="{{$ticket->estado}}">
						<td class="centrado">{{$ticket->codigo}} {{$ticket->serie}}</td>
						<td class="centrado">{{$ticket->monto ? number_format($ticket->monto, 2, ',', '.') : ''}}</td>
						<td class="centrado">{{$ticket->estado}}</td>
						<td>{{$ticket->fecha_uso}}</td>
						<td>{{$ticket->driver_id ? $ticket->driver->nombre : null}}</td>
						<td class="centrado">{{isset($ticket->vehicle_id)? $ticket->vehicle->placa : null}} - {{isset($ticket->vehicle_id)? $ticket->vehicle->marca : null}}</td>
						<td>{{$ticket->dispenser_id ? $ticket->dispenser->nombre : null}}</td>
						<td>{{$ticket->detalle}}</td>
						<td class="centrado">{{$ticket->user->name}}</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$ticket->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select({{$ticket->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
			<h4 class="panel-title"><b style="color: white;">Registro de Vales</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@include('admin.ticket.forms.form')
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
	@if( $actiModal )
	<div class="modal-dialog panel primary visible">
		<div class="panel-heading">
			<h4 class="panel-title"><b style="color: white;">Usar Vale</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@include('admin.ticket.forms.formActivar')
		</div>
		<div class="panel-footer col-4 default-soft">
			<button wire:click="usar()" type="submit" class="btn btn-min primary col-1">Recibir Vale</button>
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
</div>
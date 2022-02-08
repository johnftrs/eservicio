<div class="card">
	<?php $crear=false; $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='CTIC'){ $crear=true; }
		if ($func->code=='ETIC'){ $editar=true; }
		if ($func->code=='DTIC'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-ticket-confirmation"></i>Lotes de Vales</h5>
		{{--<select wire:model="client_id" name="client_id" wire:change="change_client" class="btn btn-min primary">
			<option value="">-- Vales por Cliente --</option>
			@foreach ($clients as $cl)
			<option value="{{$cl->id}}">{{$cl->nombre}}</option>
			@endforeach
		</select>--}}
		@if ($crear)<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>@endif
	</div>
	<div class="card-body">
		<div class="flotantes">
			<div id="filtro">
				<input type="search" placeholder="Filtro:">
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th class="centrado">Lote / Serie</th>
					<th class="centrado">Nro. Inicial</th>
					<th class="centrado">Nro. Final</th>
					<th class="centrado">Fecha</th>
					<th class="centrado">Vales</th>
					@if ($editar)<th class="centrado">Editar Lote</th>@endif
					@if ($eliminar)<th class="centrado">Borrar Lote</th>@endif
				</thead>
				<tbody>
					@foreach($lotes as $lt)
					<tr>
						<td class="centrado serie">{{$lt->serie}}</td>
						<td class="centrado serie">{{$lt->inicio}}</td>
						<td class="centrado serie">{{$lt->fin}}</td>
						<td class="centrado serie">{{\Carbon\Carbon::parse($lt->fecha)->format('d/m/Y')}}</td>
						<td class="centrado">
							<button class="btn btn-min info" wire:click="vales('{{$lt->id}}')"><i class="mdi mdi-check"></i>Ver Vales</button>
						</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$lt->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select('{{$lt->id}}')" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
			@if($accion=='edit_lote')
			@include('admin.ticket.forms.form_lote')
			@elseif($accion=='edit_ticket')
			@include('admin.ticket.forms.form_ticket')
			@else
			@include('admin.ticket.forms.form')
			@endif
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($accion=='store')
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@elseif($accion=='edit_ticket')
			<button wire:click="update_ticket()" type="submit" class="btn btn-min warning col-1">Guardar</button>
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
	@if( $page )
	@include('admin.ticket.forms.vales')
	@endif
</div>
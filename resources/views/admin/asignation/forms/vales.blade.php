<div id="page" class="@if($page) pagina @endif">
	<div class="card">
		<div class="card-header primary-low">
			<button class="btn btn-min danger" wire:click="$set('page',false)"><i class="mdi mdi-arrow-left-bold"></i>Atrás</button>
			<h5 class="card-title">Lote de Vales: {{$lote->serie}}</h5>
			<button class="btn btn-min warning" wire:click="edit({{$lote->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
		</div>
		<div class="card-body">
			<br>
			<div class="table-responsive">
				<div class="col-4">
					<div class="col-1-3">
						<div class="form-group">
							<span><b>Lote:</b></span>
							<span>{{$lote->serie}}</span>
						</div>
					</div>
					<div class="col-1-3">
						<div class="form-group">
							<span><b>Número Inicial:</b></span>
							<span>{{$lote->inicio}}</span>
						</div>
					</div>
					<div class="col-1-3">
						<div class="form-group">
							<span><b>Número Final:</b></span>
							<span>{{$lote->fin}}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header primary-low">
			<h5 class="card-title"><i class="mdi mdi-ticket-confirmation"></i>Vales</h5>
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
				</thead>
				<tbody>
					@foreach($lote->tickets as $ticket)
					<tr class="{{$ticket->estado}}">
						<td class="centrado">{{$ticket->codigo}}</td>
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
							<button class="btn btn-min warning" wire:click="edit_ticket({{$ticket->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<br>
</div>
<div id="page" class="@if($page) pagina @endif">
	<div class="card">
		<div class="card-header primary-low">
			<button class="btn btn-min danger" wire:click="close_page()"><i class="mdi mdi-arrow-left-bold"></i>Atrás</button>
			<h5 class="card-title">Cliente: {{$client->nombre}}</h5>
			<button class="btn btn-min info" wire:click="create()"><i class="mdi mdi-check"></i>Asignar Vales</button>
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
					<th class="centrado">Serie</th>
					<th class="centrado">Nro. Ini. Lote</th>
					<th class="centrado">Nro. Fin Lote</th>
					<th class="centrado">Nro. Ini. Asignado</th>
					<th class="centrado">Nro. Fin Asignado</th>
					<th class="centrado">Fecha</th>
					<th class="centrado">Estado</th>
				</thead>
				<tbody>
					@foreach($client->asignations->where('fecha','>=',$desde)->where('fecha','<=',$hasta)->sortDesc() as $asignation)
					<tr>
						<td class="centrado">{{$asignation->tickets->first()->lot->serie}}</td>
						<td class="centrado">{{$asignation->tickets->first()->lot->inicio}}</td>
						<td class="centrado">{{$asignation->tickets->first()->lot->fin}}</td>
						<td class="centrado">{{$asignation->inicio}}</td>
						<td class="centrado">{{$asignation->fin}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($asignation->fecha)->format('d/m/Y')}}</td>
						<td class="centrado">{{$asignation->estado}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<br>
</div>
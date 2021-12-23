<div id="page" class="@if($page) pagina @endif">
	<div class="card">
		<div class="card-header primary-low">
			<button class="btn btn-min danger" wire:click="$set('page',false)"><i class="mdi mdi-arrow-left-bold"></i>Atrás</button>
			<h5 class="card-title">Combustible: {{$fuels->find($modelo_id)->nombre}}</h5>
			<button class="btn btn-min warning" wire:click="edit({{$modelo_id}})"><i class="mdi mdi-pencil"></i>Editar</button>
		</div>
		<div class="card-body">
			<br>
			<div class="table-responsive">
				<div class="col-4">
					<div class="col-1-3">
						<div class="form-group">
							<span><b>Nombre:</b></span>
							<span>{{$fuels->find($modelo_id)->nombre}}</span>
						</div>
					</div>
					<div class="col-1-3">
						<div class="form-group">
							<span><b>Precio:</b></span>
							<span>{{$fuels->find($modelo_id)->precio}}</span>
						</div>
					</div>
					<div class="col-1-3">
						<div class="form-group">
							<span><b>Unidad:</b></span>
							<span>{{$fuels->find($modelo_id)->unidad}}</span>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
	<div class="card">
		<div class="card-header primary-low">
			<h5 class="card-title">Tanques</h5>
			<button class="btn btn-min default" wire:click="h_create"><i class="mdi mdi-plus-circle-outline"></i>Nuevo Tanque</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Nombre</th>
						<th>Contenido Actual</th>
						<th>Capacidad Máxima</th>
						@if ($editar)<th class="centrado">Editar</th>@endif
						@if ($eliminar)<th class="centrado">Borrar</th>@endif
					</thead>
					<tbody>
						@foreach($tanks->where('fuel_id',$modelo_id) as $tank)
						<tr>
							<td>{{$tank->nombre}}</td>
							<td>{{$tank->actual}}</td>
							<td>{{$tank->total}}</td>
							@if ($editar)
							<td class="centrado">
								<button class="btn btn-min warning" wire:click="h_edit({{$tank->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
							</td>
							@endif
							@if ($eliminar)
							<td class="centrado">
								<button type="button" wire:click="h_select({{$tank->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
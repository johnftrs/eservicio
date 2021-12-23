<div id="page" class="@if($page) pagina @endif">
	<div class="card">
		<div class="card-header primary-low">
			<button class="btn btn-min danger" wire:click="$set('page',false)"><i class="mdi mdi-arrow-left-bold"></i>Atrás</button>
			<h5 class="card-title">Dispenser: {{$dispensers->find($modelo_id)->nombre}}</h5>
			<button class="btn btn-min warning" wire:click="edit({{$modelo_id}})"><i class="mdi mdi-pencil"></i>Editar</button>
		</div>
		<div class="card-body">
			<br>
			<div class="table-responsive">
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Dispenser:</b></span>
							<span>{{$dispensers->find($modelo_id)->nombre}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>Sucursal:</b></span>
							<span>{{$dispensers->find($modelo_id)->office->nombre}}</span>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
	<div class="card">
		<div class="card-header primary-low">
			<h5 class="card-title">Mangueras</h5>
			<button class="btn btn-min default" wire:click="h_create"><i class="mdi mdi-plus-circle-outline"></i>Nueva Manguera</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Nombre</th>
						<th>Combustible</th>
						<th>Tanque</th>
						@if ($editar)<th class="centrado">Editar</th>@endif
						@if ($eliminar)<th class="centrado">Borrar</th>@endif
					</thead>
					<tbody>
						@foreach($hosepipes->where('dispenser_id',$modelo_id) as $pipe)
						<tr>
							<td>{{$pipe->nombre}}</td>
							<td>{{$pipe->tank->fuel->nombre}}</td>
							<td>{{$pipe->tank->nombre}}</td>
							@if ($editar)
							<td class="centrado">
								<button class="btn btn-min warning" wire:click="h_edit({{$pipe->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
							</td>
							@endif
							@if ($eliminar)
							<td class="centrado">
								<button type="button" wire:click="h_select({{$pipe->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
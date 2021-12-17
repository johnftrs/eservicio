<div id="page" class="@if($page) pagina @endif">
	<div class="card">
		<div class="card-header primary-low">
			<button class="btn btn-min danger" wire:click="$set('page',false)"><i class="mdi mdi-arrow-left-bold"></i>Atrás</button>
			<h5 class="card-title">Cardex: {{$nombre}}</h5>
			<button class="btn btn-min warning" wire:click="edit({{$modelo_id}})"><i class="mdi mdi-pencil"></i>Editar</button>
		</div>
		<div class="card-body">
			<br>
			<div class="table-responsive">
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Cliente:</b></span>
							<span>{{$clients->find($modelo_id)->nombre}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>NIT:</b></span>
							<span>{{$clients->find($modelo_id)->nit}}</span>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Dirección:</b></span>
							<span>{{$clients->find($modelo_id)->direccion}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>Correo:</b></span>
							<span>{{$clients->find($modelo_id)->correo}}</span>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Teléfono:</b></span>
							<span>{{$clients->find($modelo_id)->telefono}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>2do Teléfono:</b></span>
							<span>{{$clients->find($modelo_id)->telefono2}}</span>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Estado:</b></span>
							<span class="@if($clients->find($modelo_id)->estado=='Activo') verde @else rojo @endif">{{$clients->find($modelo_id)->estado}}</span>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Representante Legal:</b></span>
							<span>{{$clients->find($modelo_id)->representante_legal}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>CI Representante:</b></span>
							<span>{{$clients->find($modelo_id)->representante_ci}}</span>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Teléfono Representante:</b></span>
							<span>{{$clients->find($modelo_id)->representante_telefono}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>2do Teléfono Representante:</b></span>
							<span>{{$clients->find($modelo_id)->representante_telefono2}}</span>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-2">
						<div class="form-group">
							<span><b>Email Representante:</b></span>
							<span>{{$clients->find($modelo_id)->representante_email}}</span>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<span><b>Detalles Representante:</b></span>
							<span>{{$clients->find($modelo_id)->representante_detalles}}</span>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
	<div class="card">
		<div class="card-header primary-low">
			<h5 class="card-title">Choferes</h5>
			<button class="btn btn-min default" wire:click="d_create"><i class="mdi mdi-plus-circle-outline"></i>Nuevo Chofer</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Nombre</th>
						<th>CI</th>
						<th>Licencia</th>
						<th>Estado</th>
						@if ($editar)<th class="centrado">Editar</th>@endif
						@if ($eliminar)<th class="centrado">Borrar</th>@endif
					</thead>
					<tbody>
						@foreach($drivers->where('client_id',$modelo_id) as $driver)
						<tr>
							<td>{{$driver->nombre}} {{$driver->paterno}} {{$driver->materno}}</td>
							<td>{{$driver->ci}}</td>
							<td>{{$driver->licencia}}</td>
							<td>{{$driver->estado}}</td>
							@if ($editar)
							<td class="centrado">
								<button class="btn btn-min warning" wire:click="d_edit({{$driver->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
							</td>
							@endif
							@if ($eliminar)
							<td class="centrado">
								<button type="button" wire:click="d_select({{$driver->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header primary-low">
			<h5 class="card-title">Vehículos</h5>
			<button class="btn btn-min default" wire:click="v_create"><i class="mdi mdi-plus-circle-outline"></i>Nuevo Vehículo</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Placa</th>
						<th>Marca Modelo</th>
						<th>Año</th>
						<th>Color</th>
						<th>Estado</th>
						@if ($editar)<th class="centrado">Editar</th>@endif
						@if ($eliminar)<th class="centrado">Borrar</th>@endif
					</thead>
					<tbody>
						@foreach($vehicles->where('client_id',$modelo_id) as $vehicle)
						<tr>
							<td>{{$vehicle->placa}}</td>
							<td>{{$vehicle->marca}} - {{$vehicle->modelo}}</td>
							<td>{{$vehicle->anyo}}</td>
							<td>{{$vehicle->color}}</td>
							<td>{{$vehicle->estado}}</td>
							@if ($editar)
							<td class="centrado">
								<button class="btn btn-min warning" wire:click="v_edit({{$vehicle->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
							</td>
							@endif
							@if ($eliminar)
							<td class="centrado">
								<button type="button" wire:click="v_select({{$vehicle->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
<div class="card">
	@include('alerts.error')
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='ECOM'){ $editar=true; }
		if ($func->code=='DCOM'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-truck"></i>Compra de Combustibles</h5>
		<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>agregar</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th class="centrado">Compra</th>
					<th class="centrado">Descarga</th>
					<th class="centrado">Hora</th>
					<th class="derecha">Cantidad</th>
					<th class="derecha">Monto</th>
					<th class="centrado">Combustible</th>
					<th class="centrado">Tanque</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($buysells as $buysell)
					<tr>
						<td class="centrado">{{\Carbon\Carbon::parse($buysell->fecha_compra)->format('d/m/y')}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($buysell->fecha_descarga)->format('d/m/y')}}</td>
						<td class="centrado">{{$buysell->hora_descarga ? date('H:i',strtotime($buysell->hora_descarga)) : null}}</td>
						<td class="derecha">{{number_format($buysell->cantidad, 2, ',', '.')}}</td>
						<td class="derecha">{{number_format($buysell->debito_banco, 2, ',', '.')}}</td>
						<td class="centrado">{{$buysell->tank->fuel->nombre}}</td>
						<td class="centrado">{{$buysell->tank->nombre}}</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$buysell->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select({{$buysell->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
			<h4 class="panel-title"><b style="color: white;">Registro de Compra de Combustibles</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@include('admin.buysell.forms.form')
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
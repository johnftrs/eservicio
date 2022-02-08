<div class="card">
	<?php $crear=false; $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='CTIC'){ $crear=true; }
		if ($func->code=='ETIC'){ $editar=true; }
		if ($func->code=='DTIC'){ $eliminar=true; }
	}
	?>
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-ticket-confirmation"></i>Asignación de Vales a Clientes</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group">
				{!! Form::label('Cliente') !!}
				<select wire:model="client_id" name="client_id" class="form-control">
					<option value="">-- Seleccione una opción --</option>
					@foreach ($clients as $cli)
					<option value="{{$cli->id}}">{{$cli->nombre}}</option>
					@endforeach
				</select>
				@error ('client_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="form-group">
				{!! Form::label('Desde') !!}
				<input wire:model="desde" type="date" name="desde" placeholder="Inserte Desde" class="form-control">
				@error ('desde') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="form-group">
				{!! Form::label('Hasta') !!}
				<input wire:model="hasta" type="date" name="hasta" placeholder="Inserte Hasta" class="form-control">
				@error ('hasta') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<button wire:click="asignados" type="submit" class="btn primary col-1">Vales Asignados</button>
		</div>
	</div>
	@if( $modal )
	<div class="modal-dialog panel primary visible">
		<div class="panel-heading">
			<h4 class="panel-title"><b style="color: white;">Asignación de Vales</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@if($accion=='edit')
			@include('admin.asignation.forms.form_lote')
			@else
			@include('admin.asignation.forms.form')
			@endif
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
	@if( $page )
	@include('admin.asignation.forms.cliente')
	@endif
</div>
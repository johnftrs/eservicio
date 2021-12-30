<div class="card">
	@include('alerts.error')
	<?php $editar=false; $eliminar=false;
	foreach (Auth::user()->role->functionalities as $func) {
		if ($func->code=='DARQ'){ $eliminar=true; }
	} ?>
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-cash-multiple"></i>Arqueos: {{\Auth::user()->people->name}}</h5>
		<button class="btn btn-min default" wire:click="create"><i class="mdi mdi-plus-circle-outline"></i>nuevo arqueo</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th class="centrado">ID</th>
					<th class="centrado">Fecha</th>
					<th class="centrado">Turno</th>
					<th class="centrado">Ingreso Total</th>
					<th class="centrado">Efectivo</th>
					<th class="centrado">Tarjeta</th>
					<th class="centrado">Dispensers</th>
					<th class="centrado">Imprimir</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($reports as $report)
					<tr>
						<td class="centrado">{{$report->id}}</td>
						<td class="centrado">{{\Carbon\Carbon::parse($report->fecha)->format('d/m/Y')}}</td>
						<td class="centrado">{{$report->turn->nombre}}</td>
						<td class="centrado">Bs. {{$report->monto_total}}</td>
						<td class="centrado">Bs. {{$report->efectivo}}</td>
						<td class="centrado">Bs. {{$report->tarjeta}}</td>
						<td class="centrado">
							@foreach($report->accountings as $account)
							<div style="font-size: 14px; font-weight: bold;">({{$account->dispenser->nombre}})</div>
							@endforeach
						</td>
						<td class="centrado">
							<button class="btn btn-min info limpiar_iframe" wire:click="openModalPDF({{ $report->id }})"><i class="mdi mdi-printer"></i>Imprimir</button>
						</td>
						@if ($editar)
						<td class="centrado">
							<button class="btn btn-min warning" wire:click="edit({{$report->id}})"><i class="mdi mdi-pencil"></i>Editar</button>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<button type="button" wire:click="select({{$report->id}})" class="btn btn-min danger"><i class="mdi mdi-trash-can-outline"></i>Borrar</button>
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
			<h4 class="panel-title"><b style="color: white;">Registrar Arqueo</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@include('admin.report.forms.form')
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($accion=='store')
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			@else
			<button wire:click="update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
			@endif
			<div class="nota_footer">Efectivo Total: Bs. {{number_format($suma, 2, ',', '.')}}</div>
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
	<iframe id="iframe_id" src="{{ isset($url_pdf)?(url($url_pdf)):'' }}" style="display: none;"></iframe>
	<script type="text/javascript">
		document.getElementById('iframe_id').onload = function() {
			if ($('#iframe_id').attr('src')!='') {
				var myIframe = document.getElementById("iframe_id").contentWindow;
				myIframe.focus();
				myIframe.print();
				return false;
			}
		}
		function print() {
			var myIframe = document.getElementById("iframe_id").contentWindow;
			myIframe.focus();
			myIframe.print();
			return false;
		}
		$('body').on('click','.limpiar_iframe',function () {
			$('#iframe_id').attr('src','');
		});
	</script>
</div>
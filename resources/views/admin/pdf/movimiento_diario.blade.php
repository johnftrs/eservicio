<div class="card">
	@include('alerts.error')
	<div class="card-header primary-low">
		<h5 class="card-title"><i class="mdi mdi-cash-multiple"></i>Movimiento Diario</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="form-group">
				{!! Form::label('Fecha*','',['class'=>'naranja']) !!}
				<input wire:model="fecha" type="text" name="fecha" placeholder="Inserte Fecha" class="form-control datepicker" required>
				@error ('fecha') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="form-group">
				{!! Form::label('Turno*','',['class'=>'naranja']) !!}
				<select wire:model="turn_id" name="turn_id" class="form-control">
					@foreach ($turns as $turn)
					<option value="{{$turn->id}}">{{$turn->nombre}}</option>
					@endforeach
					<option value="TODOS">TODOS</option>
				</select>
				@error ('turn_id') <span class="validacion">*Campo Obligatorio*</span> @enderror
			</div>
			<div class="col-4">
				<div class="col-1-3"></div>
				<button type="button" class="btn btn-min info col-1" wire:click="openModalPDF()">Generar Reporte</button>
			</div>
		</div>
	</div>
	@if( $modal['active'] )
	<div class="modal-dialog panel visible">
		<div class="panel-heading primary">
			<h4 class="panel-title"><b style="color: white;">{{$modal['title']}}</b></h4>
			<a class="btn-close btn danger" wire:click="limpiar">&times;</a>
		</div>
		<div class="panel-body" >
			@if($modal['url_pdf'] != '')
			<iframe id="iframe_id" src="{{ ($modal['url_pdf'] != '')?(url($modal['url_pdf'])):'' }}"></iframe>
			@else
			@include('admin.report.forms.form')
			@endif
		</div>
		<div class="panel-footer col-4 default-soft">
			@if($modal['accion']=='store')
			<button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
			<div class="nota_footer">Efectivo Total: Bs. {{number_format($suma, 2, ',', '.')}}</div>
			@elseif($modal['accion']=='edit')
			<button wire:click="update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
			@elseif($modal['accion']=='pdf')
			<button type="button" class="btn btn-min info col-1" onclick="imprimir()">Imprimir</button>
			@endif
		</div>
	</div>
	<div id="cortina" wire:click="limpiar"></div>
	@endif
	@section('adminjs')
	<script type="text/javascript">
		$('body').on('change','input.datepicker',function() {
			@this.set($(this).attr('name'),$(this).val());
		});
		function imprimir() {
			console.log('print');
			var myIframe = document.getElementById("iframe_id").contentWindow;
			myIframe.focus();
			myIframe.print();
			return false;
		}
	</script>
	@endsection
</div>
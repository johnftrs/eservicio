<div>
	@if(\Auth::user()->role_id <= 2)
	<div class="col-1 col-mid" style="margin-top: 10%;">
		<div class="panel default-soft">
			<div class="panel-heading centrado">
				<h3 class="panel-title">Cambio de Sucursal</h3>
			</div>
			<div class="panel-body centrado">
				<br>
				@foreach($offices as $office)
				<div class="form-group">
					<div class="btn default @if(\Auth::user()->people->office_id == $office->id) primary @endif" wire:click="cambio({{$office->id}})">{{$office->nombre}}</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	@endif
</div>
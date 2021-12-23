<div class="form-group">
	{!! Form::label('Código*') !!}
	<input wire:model="code" type="text" name="code" placeholder="Inserte Nombre" class="form-control" required>
	@error ('code') <span class="validacion">*Campo Vacio o Repetido*</span> @enderror
</div>
<div class="form-group">
	{!! Form::label('Name*') !!}
	<input wire:model="name" type="text" name="name" placeholder="Inserte Nombre" class="form-control" required>
	@error ('name') <span class="validacion">*Campo Obligatorio*</span> @enderror
</div>
<div class="col-4">
	@foreach($menus as $k=>$menu)
	<?php $k++; ?>
	<div class="col-1">
		<div class="col-4 nr">
			<div class="panel info-soft">
				<div class="panel-heading"><label for="{{ $menu->code }}"><i class="fa fa-{{ $menu->icon }} fa-fw"></i> {{ $menu->label }}</label> <!--input type="checkbox" class="checkall" id={{ $menu->code }} --> </div>
				<div class="panel-body">
					@foreach($functionalities = $menu->functionalities()->orderBy('id','asc')->get() as $functionality)
					<div class="form-group">
						<input wire:model="funciones.{{$functionality->id}}" type="checkbox" class="{{$menu->code}}" id="{{ $functionality->code }}" value="{{ $functionality->id }}">
						
						{!! Form::label($functionality->code,$functionality->label) !!}
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@if ($k % 4 == 0)
</div><div class="col-4">
	@endif
	@endforeach
</div>
@section('adminjs')
<script>
	$(".checkall").change(function () {
		$("input:checkbox."+$(this).attr('id')).prop('checked', $(this).prop("checked"));
	});
</script>
@endsection
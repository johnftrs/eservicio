<div class="form-group">
	{!! Form::label('Código*') !!}
	{!! Form::text('code',$role->code ?? null,['class'=>'form-control','placeholder'=>'Insert Code','required', 'maxlength'=>10]) !!}
</div>
<div class="form-group">
	{!! Form::label('Name*') !!}
	{!! Form::text('name',$role->name ?? null,['class'=>'form-control','placeholder'=>'Insert Name','required', 'maxlength'=>20]) !!}
</div>
<div class="col-4">
	@foreach($menus as $k=>$menu)
	<?php $k++; ?>
	<div class="col-1">
		<div class="col-4 nr">
			<div class="panel info-soft">
				<div class="panel-heading"><label for="{{ $menu->code }}"><i class="fa fa-{{ $menu->icon }} fa-fw"></i> {{ $menu->label }}</label> <input type="checkbox" class="checkall" id={{ $menu->code }} > </div>
				<div class="panel-body">
					@foreach($functionalities = $menu->functionalities()->orderBy('id','asc')->get() as $functionality)
					<div class="form-group">
						{!! Form::checkbox('functionalities[]',$functionality->id,(isset($role->code)? $role->hasFunctionality($functionality->code):null) ,[ 'id'=>$functionality->code , 'class'=>$menu->code]) !!}
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
@section('adminjs2')
<script>
	$(".checkall").change(function () {
		$("input:checkbox."+$(this).attr('id')).prop('checked', $(this).prop("checked"));
	});
</script>
@endsection
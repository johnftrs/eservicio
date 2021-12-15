@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EROL'){ $editar=true; }
	if ($func->code=='DROL'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Roles</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Code</th>
					<th>Name</th>
					<th>Functionalities</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($roles as $role)
					<tr>
						<td>{{$role->code}}</td>
						<td>{{$role->name}}</td>
						<td>
							<div class="flex" style="flex-direction: column;">
								<?php $r = 0; ?>
								@foreach($role->menus() as $menu)
								<div>
									<b>{{$menu->code}}</b>:
									@foreach($role->functionalitiesByMenuCode($menu->code) as $k=> $function)
									{{$k>0?', ':''}}
									<span>{{$function->label}}</span>
									@endforeach
								</div>
								@endforeach
							</div>
						</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/role/'.$role->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/role/'.$role->id)}}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn-min danger" onclick="return confirm('Delete?');">Borrar</button>
							</form>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EGRO'){ $editar=true; }
	if ($func->code=='DGRO'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Grupos</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Id</th>
					<th>Code</th>
					<th>Nombre</th>
					<th>Foto</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($groups as $group)
					<tr>
						<td>{{$group->id}}</td>
						<td>{{$group->code}}</td>
						<td>{{$group->nombre}}</td>
						<td>{{$group->photo}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/group/'.$group->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/group/'.$group->id)}}" method="post">
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
{!!$groups->render()!!}
@endsection
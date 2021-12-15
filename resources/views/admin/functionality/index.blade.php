@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EFUN'){ $editar=true; }
	if ($func->code=='DFUN'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Functionalities</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Id</th>
					<th>Code</th>
					<th>Label</th>
					<th>Path</th>
					<th>Mostrar</th>
					<th>menu</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($functionalities as $functionality)
					<tr>
						<td>{{$functionality->id}}</td>
						<td>{{$functionality->code}}</td>
						<td>{{$functionality->label}}</td>
						<td>{{$functionality->path}}</td>
						<td>{{$functionality->mostrar}}</td>
						<td>{{$functionality->menu->label}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/functionality/'.$functionality->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/functionality/'.$functionality->id)}}" method="post">
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
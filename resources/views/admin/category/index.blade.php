@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ECAT'){ $editar=true; }
	if ($func->code=='DCAT'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Categoría de Items</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Gupo</th>
					<th>Foto</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->code}}</td>
						<td>{{$category->nombre}}</td>
						<td>{{$category->group->nombre}}</td>
						<td>{{$category->photo}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/category/'.$category->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/category/'.$category->id)}}" method="post">
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
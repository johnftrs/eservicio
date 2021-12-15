@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ECIT'){ $editar=true; }
	if ($func->code=='DCIT'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Almacenes</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Detalles</th>
					<th>Oficina</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($stores as $store)
					<tr>
						<td>{{$store->id}}</td>
						<td>{{$store->nombre}}</td>
						<td>{{$store->detalles}}</td>
						<td>{{$store->office->nombre}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/store/'.$store->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/store/'.$store->id)}}" method="post">
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
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
		<h5 class="card-title">Ciudades</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Id</th>
					<th>Code</th>
					<th>Nombre</th>
					<th>Coordenada</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($cities as $city)
					<tr>
						<td>{{$city->id}}</td>
						<td>{{$city->code}}</td>
						<td>{{$city->nombre}}</td>
						<td>{{$city->coordenada}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/city/'.$city->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/city/'.$city->id)}}" method="post">
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
{!!$cities->render()!!}
@endsection
@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ELOC'){ $editar=true; }
	if ($func->code=='DLOC'){ $eliminar=true; }
}
?>
<script> document.title = "Localidad"</script>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
			</div>
			<div id="filtro">
				<input type="search" placeholder="Filtro:">
			</div>
		</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Ubicación</th>
					<th>Ciudad</th>
					<th>Coordenada</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($locations as $location)
					<tr>
						<td>{{$location->nombre}}</td>
						<td>{{$location->city->nombre}}</td>
						<td class="f12">{{$location->coordenada}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/location/'.$location->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/location/'.$location->id)}}" method="post">
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
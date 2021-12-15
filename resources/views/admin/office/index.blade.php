@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EOFF'){ $editar=true; }
	if ($func->code=='DOFF'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Oficinas</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Coordenada</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($offices as $office)
					<tr>
						<td>{{$office->razon_social}}</td>
						<td>{{$office->direccion}}</td>
						<td>{{$office->coordenada}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/office/'.$office->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/office/'.$office->id)}}" method="post">
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
{!!$offices->render()!!}
@endsection
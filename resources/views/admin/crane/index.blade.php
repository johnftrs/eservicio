@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='ECRA'){ $editar=true; }
	if ($func->code=='DCRA'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Vehículos (Gruas)</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Código</th>
					<th>Modelo</th>
					<th>Placa</th>
					<th>Chofer</th>
					<th>Color</th>
					<th>Detalles</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($cranes as $crane)
					<tr>
						<td>{{$crane->codigo}}</td>
						<td>{{$crane->modelo}}</td>
						<td>{{$crane->placa}}</td>
						<td>{{$crane->chofer}}</td>
						<td>{{$crane->color}}</td>
						<td>{{$crane->detalles}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/crane/'.$crane->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/crane/'.$crane->id)}}" method="post">
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
{!!$cranes->render()!!}
@endsection
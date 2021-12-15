@extends('layouts.admin')
@section('content')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EINS'){ $editar=true; }
	if ($func->code=='DINS'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">Aseguradoras</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Id</th>
					<th>Codigo</th>
					<th>Nombre</th>
					@if ($editar)<th>Editar</th>@endif
					@if ($eliminar)<th>Borrar</th>@endif
				</thead>
				<tbody>
					@foreach($insurances as $insurance)
					<tr>
						<td>{{$insurance->id}}</td>
						<td>{{$insurance->codigo}}</td>
						<td>{{$insurance->nombre}}</td>
						@if ($editar)
						<td>
							<a class="btn primary" href="{{url('/admin/insurance/'.$insurance->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td>
							<form action="{{url('/admin/insurance/'.$insurance->id)}}" method="post">
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
{!!$insurances->render()!!}
@endsection
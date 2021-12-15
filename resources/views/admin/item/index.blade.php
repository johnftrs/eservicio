@extends('layouts.admin')
@section('content')
@include('modal.files')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EITE'){ $editar=true; }
	if ($func->code=='DITE'){ $eliminar=true; }
}
?>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
				<span class="btn default reset_datatable">↺</span>
				<!--div class="btn nl info" onclick="seleccionar('table-responsive')">Seleccionar todo</div-->
			</div>
			<div id="filtro">
				<input type="search" placeholder="Filtro:">
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover min">
				<thead>
					<th class="centrado">Codigo</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th class="centrado">Presentación</th>
					<th>Detalles</th>
					<th class="centrado">Cat.</th>
					<th class="centrado">Precio</th>
					<th class="centrado">Stock</th>
					<th class="centrado">Lote</th>
					<th class="centrado">Subir</th>
					@if ($editar)<th class="centrado">Editar</th>@endif
					@if ($eliminar)<th class="centrado">Borrar</th>@endif
					<th>Fotos</th>
				</thead>
				<tbody>
					@foreach($items as $item)
					<tr>
						<td class="centrado">{{$item->code}}</td>
						<td>{{$item->nombre}}</td>
						<td class="direccion">{{$item->descripcion}}</td>
						<td>{{$item->presentacion}}</td>
						<td class="direccion">{{$item->detalle}}</td>
						<td class="centrado">{{$item->category->nombre}}</td>
						<td class="centrado">{{$item->precio()}}</td>
						<td class="centrado {{$item->stock()>0?'green':'red'}}">{{$item->stock()}}</td>
						<td>
							<a class="btn success centrado" href="{{url('/admin/lot/lotsbyitem/'.$item->id)}}">Lotes</a>
						</td>
						<td>
							<a class="btn info centrado" href="{{url('/admin/file/subir/'.$item->id)}}">Fotos</a>
						</td>
						@if ($editar)
						<td class="centrado">
							<a class="btn primary" href="{{url('/admin/item/'.$item->id.'/edit')}}">Editar</a>
						</td>
						@endif
						@if ($eliminar)
						<td class="centrado">
							<form action="{{url('/admin/item/'.$item->id)}}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn-min danger" onclick="return confirm('Delete?');">Borrar</button>
							</form>
						</td>
						@endif
						<td>
							@foreach ($item->files as $file)
							<img src="{!!URL::to($file->path)!!}" width="25">
							@endforeach
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
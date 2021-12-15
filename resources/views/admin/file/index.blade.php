@extends('layouts.admin')
@section('content')
@include('modal.files')
<?php $editar=false; $eliminar=false;
foreach (Auth::user()->role->functionalities as $func) {
	if ($func->code=='EITE'){ $editar=true; }
	if ($func->code=='DITE'){ $eliminar=true; }
}
?>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">ITEM: {{$item->nombre}}</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form action="{{url('/admin/file')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input name="item_id" type="hidden" value="{{$item->id}}">
				<div class="form-group">
					{!! Form::label('Subir Fotos') !!}
					{!! Form::file('file[]',['class'=>'form-control','accept'=>'.png,.jpg,.jpeg,.bmp,.PNG,.JPG,.JPEG','multiple']) !!}
				</div>
				<div class="col-2 nb">
					{!! Form::submit('Registrar',['class'=>'btn primary col-4']) !!}
				</div>
			</form>
		</div>
		<div>
			@foreach ($item->files as $file)
			<img src="{!!URL::to($file->path)!!}">
			@endforeach
		</div>
	</div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="card">
	<div class="card-header primary-low">
		@if (isset($item))
		<h5 class="card-title">{{$item->code}} - {{$item->nombre}} - {{$item->presentacion}}</h5>
		@else
		<h5 class="card-title">Registro de Lote</h5>
		@endif
	</div>
	<div class="card-body">
		<form action="{{url('/admin/lot')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			@include('admin.lot.forms.form')
			<div class="col-2 nb">
				{!! Form::submit('Registrar',['class'=>'btn primary col-4']) !!}
			</div>
		</form>
	</div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="card">
	<div class="card-header primary-low">
		@if (isset($order))
		<h5 class="card-title">Nueva Cotización: {{$order->nombre_factura}}</h5>
		@else
		<h5 class="card-title">Nueva Cotización</h5>
		@endif
	</div>
	<div class="card-body">
		<form action="{{url('/admin/order')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			@include('admin.order.forms.form')
			<div class="col-2 nb">
				{!! Form::submit('Guardar',['class'=>'btn primary col-4']) !!}
			</div>
		</form>
	</div>
</div>
@endsection
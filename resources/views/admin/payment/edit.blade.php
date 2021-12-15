@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/payment/post/guardar')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			@include('admin.payment.forms.form')
		</form>
	</div>
</div>
@endsection
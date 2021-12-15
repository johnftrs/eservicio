@extends('layouts.admin')
@section('content')
@include('alerts.request')
@include('modal.maps')
<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/client')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
		@include('admin.client.forms.form')
		<div class="col-2 nb">
			{!! Form::submit('Registrar',['class'=>'btn primary col-4']) !!}
		</div>
		</form>
	</div>
</div>
@endsection
@section('adminjs')
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
{!!Html::script('js/maps.js')!!}
@endsection
@section('admincss')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
@endsection
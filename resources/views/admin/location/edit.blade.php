@extends('layouts.admin')
@section('content')
@include('alerts.request')
@include('modal.maps')
<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/location/'.$location->id)}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			@include('admin.location.forms.form')
			<div class="col-2 nb">
				{!! Form::submit('Guardar',['class'=>'btn primary col-4']) !!}
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
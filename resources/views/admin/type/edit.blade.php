@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/type/'.$type->id)}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			@include('admin.type.forms.form')
			<div class="col-2 nb">
				{!! Form::submit('Guardar',['class'=>'btn primary col-4']) !!}
			</div>
		</form>
	</div>
</div>
@endsection
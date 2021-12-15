@extends('layouts.admin')
@section('content')
@include('alerts.request')

<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/menu/'.$menu->id)}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			@include('admin.menu.forms.form')
			<div class="col-2 nb">
				{!! Form::submit('Guardar',['class'=>'btn primary col-4']) !!}
			</div>
		</form>
		<div id="fuentes"></div>
		<div class="cont_fonts_svg"><?php include('../public/fonts/materialdesignicons-webfont.svg'); ?></div>
		@section('adminjs2')
		<script>
			$('document').ready(function(){
				fuentes();
			});
		</script>
		@endsection
	</div>
</div>
@endsection
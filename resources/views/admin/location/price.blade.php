@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">{{App\Location::find($location_id)->city->nombre}} - {{App\Location::find($location_id)->nombre}} - {{App\Location::find($location_id)->distancia}} Km.</h5>
	</div>
	<div class="card-body">
		<br>
		<form action="{{url('/admin/price')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class=" col-4">
				<div class=" col-1-3">
					<div class="form-group orange-soft" style="text-align: right;">
						<h1>Categoría A</h1>
					</div>
				</div>
				<div class=" col-1-3">
					<div class="form-group orange-soft" style="text-align: right;">
						<h1>Categoría B</h1>
					</div>
				</div>
				<div class=" col-1-3">
					<div class="form-group orange-soft" style="text-align: right;">
						<h1>Categoría C</h1>
					</div>
				</div>
			</div>
			@foreach ($types as $type)
			@foreach ($categories as $category)
			<div class=" col-1-3">
				<div class=" col-3">
					<div class="form-group" style="text-align: right;">
						{!! Form::label($type->codigo.": ".$type->nombre) !!}
					</div>
				</div>
				<div class=" col-1">
					<div class="form-group">
						{!! Form::text('precio[]',$type->getPrecio($location_id,$category->id),['class'=>'form-control', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off']) !!}
						{!! Form::hidden('type_id[]',$type->id,['class'=>'form-control']) !!}
						{!! Form::hidden('category_id[]',$category->id,['class'=>'form-control']) !!}
					</div>
				</div>
			</div>
			@endforeach
			@endforeach
			{!! Form::hidden('location_id',$location_id,['class'=>'form-control']) !!}
			<div class=" col-4">
				{!! Form::submit('Registrar',['class'=>'btn primary col-2']) !!}
			</div>
		</form>
	</div>
</div>
@endsection
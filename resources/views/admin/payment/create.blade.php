@extends('layouts.admin')
@section('content')
@include('alerts.request')
<div class="panel">
	<div class="panel-body">
		<form action="{{url('/admin/payment')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class="form-group">
				{!! Form::label('Ticket - Solicitante*') !!}
				<select name="service_id" id="" class="form-control" required>
					<option selected disabled></option>
					@foreach ($services as $service)
					<option value="{{$service->id}}">{{$service->id}} - {{$service->solicitante->nombre}} - {{$service->precio_total}}Bs.</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				{!! Form::label('Saldo') !!}
				{!! Form::text('saldo',$payment->saldo ?? null,['class'=>'form-control', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','placeholder'=>'Inserte Saldo','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Parte*') !!}
				<select name="parte" class="form-control" required>
					<option selected disabled></option>
					<option value="SOLICITANTE">SOLICITANTE</option>
					<option value="EXCEDENTE">EXCEDENTE</option>
				</select>
			</div>
			<div class="form-group">
				{!! Form::label('Observaciones:') !!}
				{!! Form::text('observacion',null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off']) !!}
			</div>
			<div class="col-2 nb">
				{!! Form::submit('Registrar',['class'=>'btn primary col-4']) !!}
			</div>
		</form>
	</div>
</div>
@endsection
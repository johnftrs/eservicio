@extends('layouts.admin')
@section('content')
@include('alerts.pdf')
<script>
	document.title = "Mis Pagos";
</script>
<div class="card">
	<div class="card-header primary-low">
		<h5 class="card-title">
		<span>Mis Pagos</span>
		<span>Ingresos: {{$mispagos}} Bs. </span>
		</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<th style="text-align: center;">Avl</th>
					<th>Cliente</th>
					<th class="centrado">Fecha Pago</th>
					<th class="centrado">Hora Pago</th>
					<th class="centrado">Abono</th>
					<th class="centrado">Saldo</th>
					<th class="centrado">Total</th>
					<th class="centrado">Usuario</th>
					<th class="centrado">Recibido</th>
				</thead>
				<tbody>
					@foreach($payments as $payment)
					<tr>
						<td class="centrado">{{$payment->avaluo->id}}</td>
						<td>{{$payment->avaluo->client_nombre()}}</td>
						<td class="centrado">{{Carbon\Carbon::parse($payment->fecha_pago)->format('d/m/Y')}}</td>
						<td class="centrado">{{Carbon\Carbon::parse($payment->fecha_pago)->format('H:i')}}</td>
						<td class="centrado" style="text-align: center;"><b>{{$payment->abono}}</b></td>
						<td class="centrado">{{$payment->saldo-$payment->abono}}</td>
						<td class="centrado">{{$payment->saldo}}</td>
						@if ($payment->abono != 0)
						<td class="centrado">{{$payment->user->user}}</td>
						@endif
						<td class="centrado" style="text-align: center;">
							@if ($payment->recibido)
							✔
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
{!!$payments->render()!!}
@endsection

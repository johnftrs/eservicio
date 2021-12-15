<div class="panel primary-soft">
	<div class="panel-heading">Registrar Pagos</div>
	<div class="panel-body">
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('(Ticket) - Solicitante') !!}
				<div class="selectpicker">
					<a class="btn form-control primary" name="payment_id">Seleccione un Ticket<i class="mdi mdi-menu-right"></i></a>
					<div>
						<input type="text" class="buscador" placeholder="Buscar..">
						<ul>
							@foreach ($payments as $payment)
							<li><a class="selectpicker-option {{$payment->estado}}" value="{{$payment->id}}">[ Id:{{$payment->id}} ] (Ticket: {{$payment->service->id}}) - {{$payment->service->solicitante->nombre}} - <b>{{$payment->parte}}</b> - <b>{{$payment->estado}}</b> - {{$payment->saldo}}Bs.</a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<select name="payment_id" class="form-control selectpicker" required data-live-search="true" id="payments_ticket">
					<option selected disabled></option>
					@foreach ($payments as $payment)
					<option value="{{$payment->id}}" parte="{{$payment->parte}}" saldo="{{$payment->saldo}}">
						(Ticket: {{$payment->id}}) - {{$payment->service->solicitante->nombre}}
					</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-4">
			<div class="col-2">
				<div class="col-2">
					<div class="form-group">
						{!! Form::label('Parte') !!}
						{!! Form::label('','',['class'=>'form-control','id'=>'parte']) !!}
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						{!! Form::label('Saldo a pagar') !!}
						{!! Form::label('','',['class'=>'form-control','id'=>'saldo']) !!}
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="col-2 green">
					<div class="form-group">
						{!! Form::label('Abono') !!}
						{!! Form::text('abono',null,['class'=>'form-control abono','onkeypress'=>"return justNumbers(event);", 'required','autocomplete'=>'off']) !!}
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						{!! Form::label('Descuento') !!}
						{!! Form::text('descuento',null,['class'=>'form-control','onkeypress'=>"return justNumbers(event);"]) !!}
					</div>
				</div>
				<div class="col-1">
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('Observaciones:') !!}
					{!! Form::text('observacion',null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off']) !!}
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('Nº Factura:') !!}
					{!! Form::text('factura',null,['class'=>'form-control', 'maxlength'=>191,'autocomplete'=>'off','id'=>'factura']) !!}
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="col-2">
				<div class="form-group">
					{!! Form::submit('Registrar',['class'=>'btn success form-control']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
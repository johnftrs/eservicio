<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$supplier->nombre ?? null,['class'=>'form-control upper','required', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Productos') !!}
	{!! Form::text('productos',$supplier->productos ?? null,['class'=>'form-control upper', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Vendedor') !!}
	{!! Form::text('vendedor',$supplier->vendedor ?? null,['class'=>'form-control upper', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Telefono') !!}
	{!! Form::text('telefono',$supplier->telefono ?? null,['class'=>'form-control upper', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Telefono 2') !!}
	{!! Form::text('telefono2',$supplier->telefono2 ?? null,['class'=>'form-control upper', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Dirección') !!}
	{!! Form::text('direccion',$supplier->direccion ?? null,['class'=>'form-control upper', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	{!! Form::text('detalles',$supplier->detalles ?? null,['class'=>'form-control upper', 'maxlength'=>255,'autocomplete'=>'off']) !!}
</div>
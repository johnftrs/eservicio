<div class="form-group">
	{!! Form::label('Cantidad Ingreso (U.)*') !!}
	{!! Form::text('cantidad',$lot->cantidad ?? null,['class'=>'form-control lot_cantidad', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('Stock Actual (U.)*') !!}
	{!! Form::text('stock',$lot->stock ?? null,['class'=>'form-control lot_stock', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('Costo Unitario (Bs.)*') !!}
	{!! Form::text('costo_unitario',$lot->costo_unitario ?? null,['class'=>'form-control lot_costo_unitario', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('Porcentaje Ganancia (%)*') !!}
	{!! Form::text('porcentaje_incremento',$lot->porcentaje_incremento ?? null,['class'=>'form-control lot_porcentaje_incremento', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('Precio Venta (Bs.)*') !!}
	{!! Form::text('precio_venta',$lot->precio_venta ?? null,['class'=>'form-control lot_precio_venta', 'maxlength'=>11,'onkeypress'=>"return justNumbers(event);",'autocomplete'=>'off','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('Fecha de Ingreso (AAAA-MM-DD)') !!}
	{!! Form::text('fecha_ingreso',(isset($lot->fecha_ingreso))?Carbon\Carbon::parse($lot->fecha_ingreso)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control datepicker', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Fecha Producción (AAAA-MM-DD)') !!}
	{!! Form::text('fecha_produccion',$lot->fecha_produccion ?? null,['class'=>'form-control datepicker', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
	{!! Form::label('Fecha de Vencimiento (AAAA-MM-DD)') !!}
	{!! Form::text('fecha_vencimiento',$lot->fecha_vencimiento ?? null,['class'=>'form-control datepicker', 'autocomplete'=>'off']) !!}
</div>
@if (isset($item))
<div class="form-group">
	<input type="hidden" name="item_id" value="{{$item->id}}">
</div>
@endif
@if (isset($items))
<div class="form-group">
	{!! Form::label('Item') !!}
	{!! Form::select('item_id', $items, $lot->item_id ?? null, ['class'=>'form-control']) !!}
</div>
@endif
<div class="form-group">
	{!! Form::label('Almacén') !!}
	{!! Form::select('store_id', $stores, $lot->store_id ?? null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('suppliers','Proveedor',['class'=>'orange']) !!}
	{!! Form::select('supplier_id', $suppliers, $lot->supplier_id ?? null, ['class'=>'form-control']) !!}
</div>
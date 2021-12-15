<div class="form-group">
	{!! Form::label('Código') !!}
	{!! Form::text('code',$item->code ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Codigo','required', 'maxlength'=>20]) !!}
</div>
<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$item->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Insert Nombre','required', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
	{!! Form::label('Detalle') !!}
	{!! Form::text('detalle',$item->detalle ?? null,['class'=>'form-control upper','placeholder'=>'Insert Detalle', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
	{!! Form::label('Categoría*') !!}
	{!! Form::select('category_id', $categories, $item->category_id ?? null, ['class'=>'form-control']) !!}
</div>
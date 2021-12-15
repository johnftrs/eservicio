<div class="form-group">
	{!! Form::label('Nombre') !!}
	{!! Form::text('nombre',$store->nombre ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Nombre','required', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
	{!! Form::label('Detalles') !!}
	{!! Form::text('detalles',$store->detalles ?? null,['class'=>'form-control upper','placeholder'=>'Inserte Detalles', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
	{!! Form::label('Oficina') !!}
	{!! Form::select('office_id', $offices, $store->office_id ?? null, ['class'=>'form-control']) !!}
</div>
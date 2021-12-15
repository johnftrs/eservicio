<?php $abc = array("A","B"); ?>
<div class="visor">
	<div class="background close_visor"></div>
	<div class="foto">
		<div class="flecha left"><img src="{!!URL::to('icons/arrow.svg')!!}"></div>
		<div class="flecha right"><img src="{!!URL::to('icons/arrow.svg')!!}"></div>
		<div class="close_visor btn-close btn danger">&times;</div>
		{!! Form::open(['url'=>'admin/post_ajax','class'=>'post_ajax to_ajax']) !!}
		<input type="hidden" name="file_id" value="">
		<input type="hidden" name="disable" value="{{true}}">
		<input type="submit" class="btn btn-cuadrado default nl nt" value="⛔">
		{!! Form::close() !!}
	</div>
	<div class="pie"></div>
</div>
<div class="cambiar_nombre">
	<div class="back_nombre"></div>
	<div class="nombre_input">
		<form action="{{url('/admin/file')}}" method="post" accept-charset="utf-8" id="form_nombre" class="to_ajax">
			{{ csrf_field() }}
			<input type="text" name="descripcion" class="form-control col-4" placeholder="Sin Nombre">
			<input type="hidden" name="contenedor">
			<input type="submit" class="btn success col-4" value="Guardar">
		</form>
	</div>
</div>
<div class="modal-dialog panel panel-default modal-files-selector modal-files-default">
	<div class="panel-heading">
		<h4 class="panel-title">Error</h4>
		<a class="btn-close btn danger" onclick="ocultar_cortina();">&times;</a>
	</div>
	<div class="panel-body body-map">
		<div class="col-4 cont_cont_scroll">
			<div class="contenedor_files">
				<div class="mod_cont col-4">
					<div class="title primary">RECOJO</div>
					<div class="contenedor" categoria="RECOJO" letra="">
					</div>
				</div>
			</div>
			<div class="contenedor_files">
				<div class="mod_cont col-4">
					<div class="title primary">ENTREGA</div>
					<div class="contenedor" categoria="ENTREGA" letra="">
					</div>
				</div>
			</div>
		</div>
		<div class="col-4"></div>
		<div class="col-4"></div>
	</div>
</div>
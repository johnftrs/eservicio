<div class="modal-dialog panel panel-default modal-maps">
	<div class="panel-heading">
		<h4 class="panel-title">
			<span>Maps: </span>
		</h4>
		<a class="btn-close btn danger" onclick="ocultar_cortina();">&times;</a>
	</div>
	<div class="panel-body body-map">
		<div id='map' coordenada="{{Auth::user()->people->city->coordenada}}" city_id="{{Auth::user()->people->city_id}}" direccion=""></div>
	</div>
</div>
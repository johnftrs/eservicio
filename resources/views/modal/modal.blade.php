<div class="modal-dialog panel visible">
  <div class="panel-heading primary">
    <h4 class="panel-title"><b style="color: white;">{{$modal['title']}}</b></h4>
    <a class="btn-close btn danger" wire:click="limpiar">&times;</a>
  </div>
  <div class="panel-body" >
    @if($modal['url_pdf'] != '')
    <iframe id="iframe_id" src="{{ ($modal['url_pdf'] != '')?(url($modal['url_pdf'])):'' }}"></iframe>
    @else
    @include($modal['include'])
    @endif
  </div>
  <div class="panel-footer col-4 default-soft">
    @if($modal['accion']=='store')
    <button wire:click="store()" type="submit" class="btn btn-min primary col-1">Registrar</button>
    <div class="nota_footer">{{$modal['nota_footer']}}</div>
    @elseif($modal['accion']=='edit')
    <button wire:click="update()" type="submit" class="btn btn-min warning col-1">Guardar</button>
    @elseif($modal['accion']=='pdf')
    <button type="button" class="btn btn-min info col-1" onclick="imprimir()">Imprimir</button>
    @endif
  </div>
</div>
<div id="cortina" wire:click="limpiar"></div>
$('.mapsbtn').click(function() {
  var nombre = null;
  modalcode('modal-maps');
  cortina();
  L.Map = L.Map.extend({
    openPopup: function(popup) {
      this._popup = popup;
      return this.addLayer(popup).fire('popupopen', {
        popup: this._popup
      });
    }
  });
  nombre = $(this).attr('input');
  console.log(nombre);
  if ($('input[name="'+nombre+'"]').val()!=null && $('input[name="'+nombre+'"]').val()!=""){
    var result = $('input[name="'+nombre+'"]').val().split(',');
    var lat = $.trim(result[0]);
    var lon = $.trim(result[1]);
    $('#map').attr('lat',lat);
    $('#map').attr('lon',lon);
  }
  if (lat===undefined || lon===undefined) {
    var coordenada = $('#map').attr('coordenada').split(',');
    var lat = $.trim(coordenada[0]);
    var lon = $.trim(coordenada[1]);
  }

  if ($('#map').hasClass('leaflet-container')){
    map.setView([lat, lon], 14);
  }
  if (!$('#map').hasClass('leaflet-container')){
    map = L.map('map', { zoomControl: true, center: [lat, lon], minZoom: 2, zoom:14,});
  }
  L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']}).addTo(map);

  var pin_red = L.icon({iconUrl:window.location.origin+'/gr/public/icons/pin_red.svg',iconSize: [30,40],iconAnchor:[15,40],popupAnchor:[1,-31]});
  var marker = [];
  if ($('input[name="'+nombre+'"]').val()!=null && $('input[name="'+nombre+'"]').val()!=""){
    marker = L.marker([lat, lon],{icon: pin_red}).addTo(map);
  }
  map.on('click', function (e) {
    map.removeLayer(marker);
    $('input[name="'+nombre+'"]').val(e.latlng.lat.toFixed(8)+', '+e.latlng.lng.toFixed(8));
    marker = L.marker([e.latlng.lat, e.latlng.lng],{icon: pin_red}).addTo(map);
    $('#map').attr('coordenada',e.latlng.lat+','+e.latlng.lng);
  });
});

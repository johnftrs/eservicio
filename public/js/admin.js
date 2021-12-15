$('document').ready(function(){
	setTimeout(function() {$(".alert").fadeOut(1000);},4000);
	$('.close_alert').click(function() {$(this).parent('.alert').fadeOut(500);});
	$('.upper').keyup(function() { this.value = this.value.toUpperCase(); });
});
$(window).load(function () {
	try{ $('div.sidebar').animate({ scrollTop: $("li.nav_menu.active").offset().top - 80 },500); }catch{}
	if ($('.card').hasClass('totop')) {
		$('.cont_head_under').animate({ scrollTop: $(".cont_head_under tbody>tr:last-child").offset().top - $( window ).height() + 51 },1000);
	}
	/*$('#filtro>input').keyup(function(e) {
		if (e.keyCode == 8) {
			$('.table-responsive tbody>tr').removeAttr('style');
			filtro($(this).val());
		} else { filtro($(this).val()); }
	});
	$('#filtro>input').on('search', function (e) {
		$('.table-responsive tbody>tr').removeAttr('style');
	});*/
});
function toUpper(texto) {
	var palabra = texto.toUpperCase();
	var res = palabra.split(" ");
	for (var i = res.length - 1; i >= 0; i--) {
		$('.table-responsive tbody>tr').each(function(index, tr) {
			var str = $(tr).text().toUpperCase();
			var n = str.search(res[i]);
			if (n<0) { $(tr).css('display', 'none'); }
		});
	}
}
function fuentes() {
	$('glyph').each(function(index, glyph) {
		$('#fuentes').append('<div class="cont_svg" name="'+$(glyph).attr('glyph-name')+'"><svg class="svg_menu" width="512" height="512" viewBox="0 -60 512 512"><path d="'+$(glyph).attr('d')+'"></path></svg><span>'+$(glyph).attr('glyph-name')+'</span></div>');
	});
}
$('#fuentes').on('click','.cont_svg',function() {
	$('input[name="icon"]').val($(this).attr('name'));
});
$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '< Ant',
	nextText: 'Sig >',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	weekHeader: 'Sm',
	dateFormat: 'yy/mm/dd',
	yearRange: parseInt((new Date).getFullYear()-70)+':'+parseInt((new Date).getFullYear()+1),
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$('document').on('click','li.active',function() {
	$(this).removeClass('active');
	$(this).addClass('active');
});
function justNumbers(e){
	var key = e.which || e.keyCode; 
	patron = /\d/;
	te = String.fromCharCode(key); 
	return (patron.test(te) || key == 9 || key == 8 || key == 46 || key == 13);
}
function justAlfa(e){
	var txt = String.fromCharCode(e.which);
	if (!txt.match(/[A-Za-z0-9]/)) {
		return false;
	}
}
$('body').on('focus','input.datepicker',function () {
	$(this).datepicker({
		dateFormat: 'yy/mm/dd',
		changeMonth: true,
		changeYear: true
	}).focus();
});
$(".lot_porcentaje_incremento").on('keyup',function(){
	por_porcentaje();
});
$(".lot_precio_venta").on('keyup',function(){
	por_costo();
});

function por_porcentaje() {
	if ($(".lot_costo_unitario").val() != null && $(".lot_costo_unitario").val() != "" && $(".lot_costo_unitario").val() > 0) {
		var cos = $(".lot_costo_unitario").val();
		var por = 1 + ($(".lot_porcentaje_incremento").val()/100);
		var pre = cos*por;
		$(".lot_precio_venta").val(pre.toFixed(2));
	}
}
function por_costo() {
	if ($(".lot_costo_unitario").val() != null && $(".lot_costo_unitario").val() != "" && $(".lot_costo_unitario").val() > 0) {
		var cos = $(".lot_costo_unitario").val();
		var pre = $(".lot_precio_venta").val();
		var por = (pre/cos*100)-100;
		$(".lot_porcentaje_incremento").val(por.toFixed(0));
	}
}
$(".lot_cantidad").on('keyup',function(){
	$(".lot_stock").val($(".lot_cantidad").val());
});
function modal_pdf(src){
	modalcode('modal_pdf');
	iframe="<iframe id='src' src='' width='100%' height='auto' style='  max-width: 100%; height: auto;' frameborder='1' ></iframe>";
	$("#control-pdf").html(iframe);
	document.getElementById("src").src = src;
	cortina();
}
function modalcode(code) {
	$('.modal-dialog.'+code).addClass('visible');
}
function cortina() {
	$('#cortina').addClass('cortina');
}
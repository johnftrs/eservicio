$('document').ready(function() {
	var tamano = parseInt($('.nav_menu.active').children('ul').attr('tamano'));
	$('.nav_menu.active').children('ul').animate({
		paddingTop : 15,
		paddingBottom : 15,
		height: tamano+"px"
	}, 300 );
});
$(window).load(function () {
	$('#filtro>input').keyup(function(e) {
		if (e.keyCode == 8 || e.keyCode == 46) {
			$('.table-responsive tbody>tr').removeAttr('style');
		}
		filtro($(this).val());
	});
	$('#filtro>input').on('search', function (e) {
		$('.table-responsive tbody>tr').removeAttr('style');
	});
});
$('body').on('click','li.li_select',function (e) {
	var div = $(this).parent('ul').parent('div');
	div.siblings('input').val($(this).children('a').html());
	div.unbind('mouseenter').unbind('mouseleave');
	/**/
	$('.nit_factura').val($(this).attr('nit_factura'));
	$('.direccion').val($(this).attr('direccion'));
	$('.telefono').val($(this).attr('telefono'));
	$('.telefono2').val($(this).attr('telefono2'));
	$(this).parent().parent().removeAttr('style');
});
$('.pdfbtn').click(function() {
	modalcode('modal-pdf');
	$(".modal-dialog iframe").attr('src',$(this).attr('href'));
	$(".modal-dialog .panel-title").html('PDF ID: '+$(this).attr('code'));
	cortina();
	return false;
});
$('body').on('focusin','.buscador',function (e) {
	$(this).siblings('div').css('display','block');
	$(this).siblings('div').css('z-index','1');
})
$('body').on('focusout','.buscador',function (e) {
	if (!$(this).siblings('div').is(":hover")) {
		$(this).siblings('div').removeAttr('style');
		$('.li_hover').removeClass('li_hover');
	}
})
$('body').on('keydown','.buscador',function (e) {
	if (e.keyCode == 13 || e.keyCode == 38 || e.keyCode == 40) {
		e.preventDefault();
	}
});
$('body').on('keyup','.buscador',function (e) {
	if (e.keyCode == 38) { /*arriba*/
		if ($('.li_hover').prevAll('.li_item.block').first().hasClass('li_item')) {
			var li = $('.li_hover');
			li.prevAll('.li_item.block').first().addClass('li_hover');
			li.removeClass('li_hover');
		}
	} else if (e.keyCode == 40) { /*abajo*/
		if ($('.li_hover').nextAll('.li_item.block').first().hasClass('li_item')) {
			var li = $('.li_hover');
			li.nextAll('.li_item.block').first().addClass('li_hover');
			li.removeClass('li_hover');
			delete li;
		}
	} else if (e.keyCode == 13 || e.keyCode == 9) { /*enter*/
		enter_select($('.li_hover').closest('tr.tr_list').attr('id'),$('.li_hover').attr('code'));
	} else {
		$('.li_hover').removeClass('li_hover');
		var input, filter, div, li, a, i, b;
		input = $(this);
		filter = input.val().toUpperCase();
		div = $(this).siblings('div');
		li = div.children("ul").children("li");
		if($(div).css('display') !== 'block'){
			$(div).css('display','block');
			$(div).css('z-index','1');
		}
		if (filter=='') {
			div.removeAttr('style');
		}
		b = true;
		for (i = 0; i < li.length; i++) {
			a = li[i].getElementsByTagName("a")[0];
			if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
				li[i].classList.remove("none");
				li[i].classList.add("block");
				if (b) {
					li[i].classList.add("li_hover");
					b = false;
				}
			} else {
				li[i].classList.remove("block");
				li[i].classList.add("none");
			}
		}
	}
});
/*aqui*/
function enter_select(tr_id, code) {
	var div = $("#"+tr_id+" li[code='"+code+"']").parent('ul').parent('div');
	var code = $("#"+tr_id+" li[code='"+code+"']").attr('code');
	var stock = $("#"+tr_id+" li[code='"+code+"']").attr('stock');
	var precio = $("#"+tr_id+" li[code='"+code+"']").attr('precio');
	var lot_id = $("#"+tr_id+" li[code='"+code+"']").attr('lot_id');
	$('#'+tr_id+' .lot_id').val(lot_id);
	$('#'+tr_id+' .item_nombre').val(code);
	$('#'+tr_id+' .stock').html(stock);
	$('#'+tr_id+' .precio').html(precio);
	$('#'+tr_id+' .cantidad').focus();
	div.removeAttr('style');
	$('.li_hover').removeClass('li_hover');
	if($('#'+tr_id).is(':last-child')) {
		clonar();
	}
}
$('body').on('keydown','.cantidad',function (e) {
	if (e.keyCode == 13 || e.keyCode == 9) {
		e.preventDefault();
	}
});
$('body').on('keyup','.cantidad',function (e) {
	var tr_id = $(this).closest('tr.tr_list').attr('id');
	var num = parseInt( tr_id.match(/\d+/g), 10 ) +1;
	var b = parseInt($('#'+tr_id+' .descuento').val());
	suma_subtotal('klon'+(num-1),b);
	if (e.keyCode == 13) { $('#klon'+num+' .item_nombre').focus(); }
	if (e.keyCode == 9) { $('#klon'+(num-1)+' .descuento').focus(); }
});
$('body').on('keydown','.descuento',function (e) {
	if (e.keyCode == 13) { e.preventDefault(); }
});
$('body').on('keyup','.descuento',function (e) {
	var tr_id = $(this).closest('tr.tr_list').attr('id');
	suma_subtotal(tr_id,1);
});
$('body').on('keydown','.t_descuento',function (e) {
	if (e.keyCode == 13) { e.preventDefault(); }
});
$('body').on('keyup','.t_descuento',function (e) {
	total();
});
function suma_subtotal(tr_id,b) {
	var precio = parseFloat($('#'+tr_id+' .precio').html());
	var cantidad = parseFloat($('#'+tr_id+' .cantidad').val());
	var descuento = parseInt($('#'+tr_id+' .descuento').val());
	if (isNaN(descuento)) { descuento = ''; }
	var subtotal = precio*cantidad;
	if (isNaN(subtotal)) { subtotal = ''; }
	if (b) { $('#'+tr_id+' .precio_venta_d').html((subtotal).toFixed(2)); }
	$('#'+tr_id+' .precio_venta').html((subtotal-(subtotal*descuento/100)).toFixed(2));
	$('#'+tr_id+' .i_precio_venta').val((subtotal-(subtotal*descuento/100)).toFixed(2));
	total();
}
function total() {
	var total = 0;
	$.each($('.precio_venta'), function( key, precio_venta ) {
		if (!isNaN(parseFloat($(precio_venta).html()))) {
			total = parseFloat(total) + parseFloat($(precio_venta).html());
		}
	});
	var descuento = parseFloat($('.t_descuento').val());
	if (isNaN(descuento)) {
		descuento = '';
	}
	$('.t_descuento').val(descuento);
	$('.total_d').html(total.toFixed(2));
	$('.subtotal').val(total.toFixed(2));
	var fac_descuento = descuento/100;
	n_total = total-(total*fac_descuento);
	$('.total').html(n_total.toFixed(2));
	$('.itotal').val(n_total.toFixed(2));
}
$('.clonar').click(function() {
	clonar();
});
function clonar() {
	var $tr = $('tr[id^="klon"]:last');
	var num = parseInt( $tr.prop("id").match(/\d+/g), 10 ) +1;
	var $klon = $tr.clone().prop('id', 'klon'+num );
	$tr.after( $klon );
	$('#klon'+num+'>td:first-child').html(num);
	$('#klon'+num+' .lot_id').val('');
	$('#klon'+num+' .item_nombre').val('');
	$('#klon'+num+' .stock').html('');
	$('#klon'+num+' .precio').html('');
	$('#klon'+num+' .cantidad').val('');
	$('#klon'+num+' .descuento').val('');
	$('#klon'+num+' .none').removeClass('none').addClass('block');
}
$('body').on('click','li.li_item.block',function (e) {
	var div = $(this).parent('ul').parent('div');
	div.siblings('input').val($(this).attr('code'));
	div.unbind('mouseenter').unbind('mouseleave');
	enter_select($(this).closest('tr.tr_list').attr('id'),$(this).attr('code'));
	$('.li_hover').removeClass('li_hover');
});
function ocultar_cortina() {
	if ($('.modal-dialog').hasClass('visible')) {
		$(".modal-dialog iframe").attr('src','');
	}
	$('#cortina').removeClass('cortina');
	$('.visible').removeClass('visible');
	$('aside').removeClass('mostrar');
}
function modal() {
	$('.modal-dialog').addClass('visible');
}
function modalcode(code) {
	$('.modal-dialog.'+code).addClass('visible');
	$('input.abono').focus();
}
function cortina() {
	$('#cortina').addClass('cortina');
}
function buscar(i) {
	$(i).parent().addClass('visible');
	$(i).parent().children('input').select();
	$(i).parent().children('input').focus();
	cortina();
}
function desplegar_log(i) {
	$(i).parent().addClass('visible');
	cortina();
}
$('body').on('click','li.nav_menu>a',function (e) {
	if (e.target == this) {
		var ul = $(this).siblings('ul');
		var tamano = parseInt($(this).siblings('ul').attr('tamano'));
		if ($(this).parent().hasClass('active')) {
			if ($(this).siblings('ul').attr('style')==null) {
				$(this).siblings('ul').attr('style',"padding-top: 15px; padding-bottom: 15px; height: "+tamano+"px; opacity: 1;")
			}
			$(this).siblings('ul').animate({
				paddingTop : 0,
				paddingBottom : 0,
				height: "0px"
			}, 300 );
			$(this).parent().removeClass('active');
		} else {
			$('li.nav_menu.active').children('ul').animate({
				paddingTop : 0,
				paddingBottom : 0,
				height: "0px"
			}, 300 );
			$('li.nav_menu').removeClass('active');

			$(this).siblings('ul').animate({
				paddingTop : 15,
				paddingBottom : 15,
				height: tamano+"px"
			}, 300 );
			$(this).parent().addClass('active');
		}
	}
});
$('body').on('click','ul.tab-nav>li',function (e) {
	var tab = $(this).attr('tab');
	$('.tab-active').removeClass('tab-active');
	$(this).addClass('tab-active');
	$('.tab-panel[tab="'+tab+'"]').addClass('tab-active');
});
$(".conte>div.body").on("scroll", function() {
	$("div.nombres>.body").scrollTop($(this).scrollTop());
	$(".conte>div.header").scrollLeft($(this).scrollLeft());
});
$('.asis_hover>div>div').hover(function() {
	var ins = '.'+$(this).parent().parent().attr('ins');
	$(ins).children().attr('style','background-color: rgba(0,0,0,0.6);color:#FFF;');
	var asis = '.'+$(this).attr('asis');
	var stilo_asis = $(asis).attr('style');
	$(asis).attr('style',stilo_asis+'background-color:rgba(156,39,176,0.3);');
},function() {
	var ins = '.'+$(this).parent().parent().attr('ins');
	$(ins).children().removeAttr('style');
	var asis = '.'+$(this).attr('asis');
	var stilo_asis = $(asis).attr('style');
	var res = stilo_asis.replace("background-color:rgba(156,39,176,0.3);", "");
	$(asis).attr('style',res);
});
$('body').on('click','.nombre_modulo',function (e) {
	if ($(this).hasClass('promo')) {
		return null;
	} else {
		var padre = $(this).parent().width();
		var modulo = $(this).parent().attr('modulo');
		if (padre > 150) {
			$(this).css({'top':'10px'});
			$(this).parent().width(150);
			$(this).parent().css({'overflow':'hidden'});
			$(".body_modulos[modulo='"+modulo+"']").width(150);
			$(".body_modulos[modulo='"+modulo+"']").css({'overflow':'hidden'});
		}
		if (padre <= 150) {
			$(this).removeAttr('style');
			$(this).parent().removeAttr('style');
			$(".body_modulos[modulo='"+modulo+"']").removeAttr('style');
		}
	}
});
function mostrar_aside() {
	$('aside').addClass('mostrar');
	cortina();
}
$('body').on('click','.btn-modal',function (e) {
	var modal = '.'+$(this).attr('modal');
	$(modal).addClass('visible');
	cortina();
});
$('body').on('click','div.selectpicker>a',function (e) {
	var div = $(this).siblings('div');
	if (div.hasClass('desplegado')) {
		div.removeClass('desplegado');
	} else {
		div.addClass('desplegado');
		div.children('input').select();
		div.children('input').focus();
	}
});
$('body').on('click','.selectpicker-option',function (e) {
	var valu = $(this).attr('value');
	var div_padre = $(this).parent().parent().parent();
	var select = div_padre.parent().siblings('select.selectpicker');
	$(select).children('option[value="'+valu+'"]').prop('selected', true);
	$(select).trigger('change');
	var nom = $(select).children('option:selected').html();
	$(this).parent().siblings('li').children('a').removeClass('selected');
	$(this).addClass('selected');
	div_padre.siblings('a').html(nom+'<i class="mdi mdi-menu-right">');
	div_padre.removeClass('desplegado');
});
function seleccionar(clase) {
	var obj = $("."+clase).get(0);
	if (window.getSelection) { 
		var sel = window.getSelection();
		var range = document.createRange();
		range.selectNodeContents(obj);
		sel.removeAllRanges();
		sel.addRange(range);
	} else if (document.selection) { 
		document.selection.empty();
		var range = document.body.createTextRange();
		range.moveToElementText(obj);
		range.select();
	}
}
function filtro(texto) {
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
$('document').ready(function(){
	var tamano = parseInt($('.nav_menu.active').children('ul').attr('tamano'));
	$('.nav_menu.active').children('ul').animate({
		paddingTop : 15,
		paddingBottom : 15,
		height: tamano+"px"
	}, 300 );
});
$(window).load(function () {
	$('thead').on('click','.sorting_asc', function() {
		$(this).children('i').removeClass('mdi-menu-swap');
		$(this).children('i').removeClass('mdi-menu-down');
		$(this).children('i').addClass('mdi-menu-up');
		remover_sorting();
	});
	$('thead').on('click','.sorting_desc', function() {
		$(this).children('i').removeClass('mdi-menu-up');
		$(this).children('i').addClass('mdi-menu-down');
		remover_sorting();
	});
	$('.reset_datatable').click(function() {
		if (!$('.tr_flotante>th:first-child').hasClass('sorting_asc')) {
			$('.tr_flotante>th:first-child').trigger("click");
		}
	});
	ajustar_tamanos_thead();
	$('#filtro>input').keyup(function() {
		filtro($(this).val());
	});
	$('#filtro>input').on('search', function () {
		filtro($(this).val());
	});
});
$( window ).resize(function() {
	ajustar_tamanos_thead();
});
$('.change_date').change(function(event) {
	var url = window.location.href;
	url = url.split('/desde/')[0];
	window.location=url+"/desde/"+$(this).val();
});
function seleccionar(clase){
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
	$('.table-responsive tbody>tr>.serie').each(function(index, tr) {
		var str = $(tr).text().toUpperCase();
		var n = str.search(palabra);
		if (n<0) {
			$(tr).parent().css('display', 'none');
		} else {
			$(tr).parent().removeAttr('style');
		}
	});
	ajustar_tamanos_thead();
}
function ajustar_tamanos_thead() {
	$('.cont_head_hover').removeAttr('style');
	$.each($('.cont_head_hover th'), function(index, th) {
		var width = $('.cont_head_under th').eq(index).width();
		$(th).css('width', width);
	});
	$('.cont_head_hover').css('display', 'block');
}
function remover_sorting(){
	$('th.sorting>i.mdi-menu-up').removeClass('mdi-menu-up').addClass('mdi-menu-swap');
	$('th.sorting>i.mdi-menu-down').removeClass('mdi-menu-down').addClass('mdi-menu-swap');
}
$('.pdfbtn').click(function() {
	modalcode('modal-pdf');
	$(".modal-dialog iframe").attr('src',$(this).attr('href'));
	$(".modal-dialog .panel-title").html('PDF ID: '+$(this).attr('code'));
	cortina();
	return false;
});
$('input.buscador').focusin(function() {
	$(this).select();
});
$('input.buscador').focusout(function() {
	if ($(this).siblings('ul').is(":hover")) {}else{
		$(this).parent().removeClass('desplegado');
	}
});
$('body').on('keyup','.buscador',function (e) {
	buscador_autocomplete($(this));
});
$('.autocompletar').keyup(function(e) {
	if($(this).val().length > 0){
		$(this).siblings('ul').addClass('active');
	} else {
		$(this).siblings('ul').removeClass('active');
	}
	$(this).focus();
});
$('body').on('click','.text-select>input',function (e) {
	if ($(this).hasClass('autocompletar')) {
		if($(this).val().length > 0){
			$(this).siblings('ul').addClass('active');
		} else {
			$(this).siblings('ul').removeClass('active');
		}
	} else {
		$(this).siblings('ul').addClass('active');
	}
	buscador_autocomplete($(this));
});
$('body').on('focusout','.text-select>input',function (e) {
	if (!$(this).siblings('ul').is(":hover")) {
		$(this).siblings('ul').removeClass('active');
	}
});
$('body').on('click','.text-select>ul>li>a',function (e) {
	/*var ul = $(this).parent('li').parent('ul');*/
	/*ul.siblings('input').val($(this).html());*/
	$(this).parent().parent().removeClass('active');

});
function buscador_autocomplete(input) {
	var filter, ul, li, a, i;
	filter = input.val().toUpperCase();
	ul = input.siblings('ul');
	li = ul.children("li");

	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "block";
		} else {
			li[i].style.display = "none";
		}
	}
}
function ocultar_cortina() {
	$('#cortinafull').removeClass('cortina');
	$('.visible').removeClass('visible');
	$('aside').removeClass('mostrar');
	reset_select();
}
function modal() {
	$('.modal-dialog').addClass('visible');
}
function modalcode(code) {
	$('.modal-dialog.'+code).addClass('visible');
}
function cortina() {
	$('#cortinafull').addClass('cortina');
}
function buscar(i){
	$(i).parent().addClass('visible');
	$(i).parent().children('input').select();
	$(i).parent().children('input').focus();
}
$('#input_buscador').keyup(function(e){
	if (e.keyCode == 13 && $(this).val().length != 0) {
		window.open(window.location.origin+'/csv/public/admin/avaluo/'+$(this).val(), '_blank');
	}
});
function desplegar_log(i){
	if ($(i).parent().hasClass('visible')) {
		$(i).parent().removeClass('visible');
	} else {
		$(i).parent().addClass('visible');
	}
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
$(".cont_head_under").on("scroll", function() {
	$(".cont_head_hover").scrollLeft($(this).scrollLeft());
});
$(".screen table").on("scroll", function() {
	var top = parseInt($(this).scrollTop());
	$(".screen table .tr_flotante").css('top', top+'px');
});
$('.td_dia').hover(function() {
	var dia = $(this).attr('dia');
	$('.th_dia[dia="'+dia+'"]').attr('style','background-color: rgba(85,255,105,0.4);color:#FFF;');
	$(this).attr('style','background-color: rgba(85,255,105,0.4);color:#FFF;');
},function() {
	var dia = $(this).attr('dia');
	$('.th_dia[dia="'+dia+'"]').removeAttr('style');
	$(this).removeAttr('style');
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
$('.tr_hojadecampo').hover(function() {
	var tr = $(this).attr('tr');
	if ($(this).is(":hover")) {
		$("tr[tr='"+tr+"']").not($(this)).addClass('hover');
	}else{
		$("tr.hover").removeClass('hover');
	}
});
$('.modal-files-selector').on('change','input[type=file]',function() {
	var form = '<form method="POST" action="'+window.location.origin+'/csv/public/admin/file" accept-charset="UTF-8" enctype="multipart/form-data"><label for="file_reemplazar"><div class="btn default">+</div></label><input type="file" name="file[]" id="file_reemplazar" multiple=""><input type="hidden" name="avaluo_id" value="avl_reemplazar"><input type="hidden" name="categoria" value="cat_reemplazar"><input type="hidden" name="contenedor" value="contenedor_reemplazar">input_letra</form>';
	var form_html = '<div class="carpeta"><span>Nuevo</span>'+form+'</div>';
	var url = $(this).parent().attr("action");
	$(this).parent().attr('id','formuploadajax');
	var avaluo_id = $(this).siblings('input[name="avaluo_id"]').val();
	var categoria = $(this).siblings('input[name="categoria"]').val();
	var contenedor = $(this).siblings('input[name="contenedor"]').val();
	var letra = $(this).parent().parent().parent().val();
	var formData = new FormData(document.getElementById("formuploadajax"));
	var formulario = $(this).parent();
	formulario.css('display', 'none');
	var carpeta = $(this).parent().parent();
	for (var i = 0; i < $(this).prop('files').length; i++) {
		var ext = $(this).prop('files')[i].name.split(".")[1];
		if (ext=="jpg" || ext=="jpeg" || ext=="png") {
			carpeta.append("<div class='new'><img class='loading' src='"+window.location.origin+"/csv/public/icons/loading.svg'><img class='file_uploading' src='"+window.location.origin+"/csv/public/icons/jpg.svg'></div>");
		} else if (ext=="xls" || ext=="xlsx") {
			carpeta.append("<div class='new'><img class='loading' src='"+window.location.origin+"/csv/public/icons/loading.svg'><img class='file_uploading' src='"+window.location.origin+"/csv/public/icons/xls.svg'></div>");
		} else if (ext=="pdf") {
			carpeta.append("<div class='new'><img class='loading' src='"+window.location.origin+"/csv/public/icons/loading.svg'><img class='file_uploading' src='"+window.location.origin+"/csv/public/icons/pdf.svg'></div>");
		} else {
			carpeta.append("<div class='new'><img class='loading' src='"+window.location.origin+"/csv/public/icons/loading.svg'><img class='file_uploading' src='"+window.location.origin+"/csv/public/icons/file.svg'></div>");
		}
	}
	$.ajaxSetup({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});
	$.ajax({
		url: url,
		type: "post",
		dataType: "html",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data){
			data = JSON.parse(data);
			$('.new').remove();
			for (var i = 0; i < data.length; i++) {
				var directory_id = data[i].id;
				var disable = data[i].disable;
				var path = data[i].path;
				var ext = data[i].ext;
				var file_id = data[i].file_id;
				var lupa = "<a class='lupa' disable='"+disable+"' file_id='"+directory_id+"' href='"+window.location.origin+"/csv/public/"+path.replace('MIN-','')+"'><img src='"+window.location.origin+"/csv/public/icons/lupa.svg'></a>";
				var download = "<a class='download' download='"+data[i].nombre+"' href='"+window.location.origin+"/csv/public/"+path.replace('MIN-','')+"'><img  class='descargar' src='"+window.location.origin+"/csv/public/icons/download.svg'></a>";
				if (ext=="jpg" || ext=="jpeg" || ext=="png") {
					carpeta.append("<div>"+download+lupa+"<img id='"+directory_id+"' class='stored' src='"+window.location.origin+"/csv/public/"+path+"'></div>");
				} else if (ext=="xls" || ext=="xlsx") {
					carpeta.append("<div>"+download+"<img id='"+directory_id+"' src='"+window.location.origin+"/csv/public/icons/xls.svg'></div>");
				} else if (ext=="pdf") {
					carpeta.append("<div>"+download+"<img id='"+directory_id+"' src='"+window.location.origin+"/csv/public/icons/pdf.svg'></div>");
				} else {
					carpeta.append("<div>"+download+"<img id='"+directory_id+"' src='"+window.location.origin+"/csv/public/icons/file.svg'></div>");
				}
			}
			if (letra=="") {
				var input_letra = "";
			} else {
				var input_letra = '<input type="hidden" name="letra" value="'+letra+'"/>';

			}
			var math = Math.random().toString().replace('.','');
			if (contenedor == 'contenedor_reemplazar') {
				carpeta.attr('id', file_id);
				contenedor = file_id;
			}
			carpeta.append(form.replace('avl_reemplazar',avaluo_id).replace('input_letra',input_letra).replace('cat_reemplazar',categoria).replace('contenedor_reemplazar',contenedor).replace(/file_reemplazar/g,math));
			formulario.remove();
			if (carpeta.children('span').text()=='Nuevo') {
				carpeta.children('span').text('Sin Nombre');
				var math = Math.random().toString().replace('.','');
				carpeta.parent().append(form_html.replace('avl_reemplazar',avaluo_id).replace('input_letra',input_letra).replace('cat_reemplazar',categoria).replace(/file_reemplazar/g,math));
			}
		},
		error: function(data){
			console.log(data.status);
		}
	});
});
$('.subir').click(function(button) {
	$(".carpeta").remove();
	var hoja = $(this).attr("hoja");
	modalcode('modal-files-'+hoja);
	cortina();
	var avaluo_id = $(this).attr("avaluo_id");
	var form = '<form method="POST" action="'+window.location.origin+'/csv/public/admin/file" accept-charset="UTF-8" enctype="multipart/form-data"><label for="file_reemplazar"><div class="btn default">+</div></label><input type="file" name="file[]" id="file_reemplazar" multiple=""><input type="hidden" name="avaluo_id" value="avl_reemplazar"><input type="hidden" name="categoria" value="cat_reemplazar"><input type="hidden" name="contenedor" value="contenedor_reemplazar">input_letra</form>';
	var form_html = '<div class="carpeta"><span>Nuevo</span>'+form+'</div>';
	$(".modal-files-"+hoja+" .panel-title").html("Avaluo "+$(this).attr("avaluo_id")+": Documentos");
	$.get("/csv/public/admin/getfiles/"+avaluo_id,function(files,response){
		for (var i = 0 ; i < files.length; i++) {
			var categoria = files[i][0].categoria;
			var letra = files[i][0].letra;
			var descripcion = files[i][0].descripcion;
			if (letra==null) {letra="";}
			var file_id = files[i][0].file_id;
			if (files[i][0].descripcion == null) {
				descripcion = "";
			}
			var directory_id = files[i][0].directory_id;
			$(".modal-files-"+hoja+" .contenedor[categoria='"+categoria+"'][letra='"+letra+"']").append("<div class='carpeta' id='"+file_id+"'><span>"+((descripcion=="")?"Sin Nombre":descripcion)+"</span></div>");
			for (var j = 0 ; j < files[i].length; j++) {
				var directory_id = files[i][j].directory_id;
				var disable = files[i][j].disable;
				var path = files[i][j].path;
				var ext = files[i][j].ext;
				var lupa = "<a class='lupa' disable='"+disable+"' file_id='"+directory_id+"' href='"+window.location.origin+"/csv/public/"+path.replace('MIN-','')+"'><img src='"+window.location.origin+"/csv/public/icons/lupa.svg'></a>";
				var download = "<a class='download' download='"+files[i][j].nombre+"' href='"+window.location.origin+"/csv/public/"+path.replace('MIN-','')+"'><img  class='descargar' src='"+window.location.origin+"/csv/public/icons/download.svg'></a>";
				if (ext=="jpg" || ext=="jpeg" || ext=="png") {
					$('#'+file_id).append("<div>"+download+lupa+"<img id='"+directory_id+"' class='stored' src='"+window.location.origin+"/csv/public/"+path+"'></div>");
				} else if (ext=="xls" || ext=="xlsx") {
					$('#'+file_id).append("<div>"+download+"<img id='"+directory_id+"' src='"+window.location.origin+"/csv/public/icons/xls.svg'></div>");
				} else if (ext=="pdf") {
					$('#'+file_id).append("<div>"+download+"<img id='"+directory_id+"' src='"+window.location.origin+"/csv/public/icons/pdf.svg'></div>");
				} else {
					$('#'+file_id).append("<div>"+download+"<img id='"+directory_id+"' src='"+window.location.origin+"/csv/public/icons/file.svg'></div>");
				}
			}
			var math = Math.random().toString().replace('.','');
			if (letra=="") {
				var input_letra = "";
			} else {
				var input_letra = '<input type="hidden" name="letra" value="'+letra+'"/>';

			}
			$("#"+file_id).append(form.replace('avl_reemplazar',avaluo_id).replace('input_letra',input_letra).replace('cat_reemplazar',categoria).replace('contenedor_reemplazar',file_id).replace(/file_reemplazar/g,math));
		}
	}).done(function() {
		$.each($('.modal-files-'+hoja+' .contenedor'), function( key, contenedor ) {
			if ($(contenedor).attr('letra')=="") {
				var input_letra = "";
			} else {
				var input_letra = '<input type="hidden" name="letra" value="'+$(contenedor).attr('letra')+'"/>';

			}
			var math = Math.random().toString().replace('.','');
			$(contenedor).append(form_html.replace('avl_reemplazar',avaluo_id).replace('input_letra',input_letra).replace(/file_reemplazar/g,math).replace('cat_reemplazar',$(contenedor).attr('categoria')));
		});
	});
});
$(document).on('click','.lupa',function (e) {
	e.preventDefault();
	zoom($(this));
});
$('.close_visor').click(function(button) {
	$(".visor").removeClass("visible");
});
$('.flecha.right').click(function() {
	if (!$(".zoom").next('div').length) {
		zoom($(".zoom").parent().children("div:first").children('.lupa'));
	} else {
		zoom($(".zoom").next('div').children('.lupa'));
	}
});
$('.flecha.left').click(function() {
	if (!$(".zoom").prev().length) {
		zoom($(".zoom").parent().children("div:last").children('.lupa'));
	} else {
		zoom($(".zoom").prev().children('.lupa'));
	}
});
function zoom(elemento){
	$('.foto>img').remove();
	$(".zoom").removeClass("zoom");
	elemento.parent().addClass('zoom');
	var url = elemento.attr("href");
	var file_id = elemento.attr("file_id");
	var disable = elemento.attr("disable");
	var id_contenedor = elemento.parent().parent().attr("id");
	$('.foto').append("<img src='"+url+"'>");
	$('.foto').find('input[name="file_id"]').attr('value',file_id);
	if (disable != "true") {
		$('.foto').find('input[type="submit"]').addClass('btn_desactivar');
	} else {
		$('.foto').find('input[type="submit"]').removeClass('btn_desactivar');
	}
	if (!$(".visor").hasClass('visible')) {
		$('.pie').empty();
		$("#"+id_contenedor).clone().appendTo(".pie");
		$('.pie').children().children('form').remove();
		$('.pie').children().children('span').remove();
	}
	$(".visor").addClass("visible");
}
$(document).on('click','.carpeta>span',function (e) {
	if ($(this).text()=='Nuevo') {return null;}
	var id = $(this).parent().attr('id');
	$(".cambiar_nombre").addClass('visible');
	var form_nombre = $(".cambiar_nombre").children().children();
	form_nombre.children('input[name="contenedor"]').val(id);
	if ($(this).text()!='Sin Nombre') {
		form_nombre.children('input[name="descripcion"]').val($(this).text()).select();
	}
	form_nombre.children('input[name="descripcion"]').focus();
});
$('.back_nombre').click(function() {
	$(".cambiar_nombre.visible").removeClass('visible');
	$("#form_nombre input[type='hidden']").val(null);
	$("#form_nombre input[type='text']").val(null);
});
$('#form_nombre').on('submit',function(e) {
	e.preventDefault(e);
	var data = $(this).serialize();
	var url = $(this).attr("action");
	$.ajaxSetup({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		dataType: 'json',
		success: function(data){
			$(".cambiar_nombre.visible").removeClass('visible');
			$("#form_nombre input[type='hidden']").val(null);
			$("#form_nombre input[type='text']").val(null);
			$('#'+data.file_id+">span").text(data.descripcion);
		},
		error: function(data){
			console.log('Error/'+data.status);
		}
	});
});
$('.asignar_gabinete').change(function(e) {
	e.preventDefault();
	modalcode('modal-confirmacion');
	cortina();
	$(".confirmar").removeAttr('href');
	$(".confirmar").attr('avaluo_id',$(this).siblings('input[name="avaluo_id"]').val());
	$(".denegar").removeAttr('href');
	$(".denegar").attr('avaluo_id',$(this).siblings('input[name="avaluo_id"]').val());
	$(this).addClass('reset_select');
});
$(".confirmar").click( function() {
	input = $('input[name="avaluo_id"][value="'+$(this).attr('avaluo_id')+'"]');
	input.parent().submit();
});
function reset_select(){
	$('.reset_select').each(function(index, select) {
		$(select).val($(select).data("default-value"));
		$(select).removeClass('reset_select()');
	});
}
$(".btn_notas").click(function(e) {
	$('.scroll').empty();
	var avaluo_id = $(this).attr('avaluo_id');
	$(".contenedor_nota .avaluo_id").val(avaluo_id);
	$.get("/csv/public/admin/getnotes/"+avaluo_id,function(notes,response){
		if (notes.length==0) {
			$('.contenedor_nota>.scroll').append('<div class="vacio">Sin Notas :(</div>');
		}
		$.each(notes, function(index, note) {
			$('.contenedor_nota>.scroll').append('<div ondragover="allowDrop(event)" ondragstart="dragStart(event)" ondragend="dragEnd(event ,'+note.id+')" draggable="true"  ontouchstart="touchStart('+note.id+')" ontouchend="dragEnd(event ,'+note.id+')" name="nota" class="nota" id="'+note.id+'"  ondblclick="respondernota('+note.id+')"><div class="user">'+note.user.people.nombre+'</div><div class="hora">'+note.hora+'</div><div class="fecha">'+note.fecha+'</div>'+note.nota+'</div>',);
		});
	}).done(function() {
		var x = e.pageX - e.target.offsetLeft - 390;
		var y = e.pageY - e.target.offsetTop - 50;
		if (y<100) {
			y=100;
		}
		if (y>($( window ).height() - $(".contenedor_nota").height() - 100)) {
			y=$( window ).height() - $(".contenedor_nota").height() - 100;
		}
		$(".contenedor_nota").animate({left: x+'px',top: y+'px'},'fast');
		$(".contenedor_nota input[name='nota']").focus();;
		scroll_top_note();
	});
	$(".contenedor_nota").addClass('visible');
	cortina();
	/*--marcacion lecturra--*/
	var btn_notas = $(this);
	if (btn_notas.hasClass('noleido')) {
		$.get("/csv/public/admin/note/marcar_leido/"+avaluo_id,function(notes,response){
			console.log(notes);
			if (notes == "marcado leido") {
				btn_notas.removeClass('noleido');
			}
		});
	}
});
$(".enviar_nota").click(function(e) {
	var height = $('.contenedor_nota').height();
	e.preventDefault();
	var data = $(this).parent().serialize();
	var url = $(this).parent().attr("action");
	$.ajaxSetup({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		dataType: 'json',
		success: function(data){
			$("#form_notas input[name='nota']").val(null);
			$('.vacio').remove();
			$('.contenedor_nota>.scroll').append('<div ondragover="allowDrop(event)" ondragstart="dragStart(event)" ondragend="dragEnd(event ,'+data.id+')" draggable="true"  ontouchstart="touchStart()" ontouchend="dragEnd(event ,'+data.id+')" name="nota" class="nota" id="'+data.id+'"  ondblclick="respondernota('+data.id+')"><div class="user">'+data.user+'</div><div class="hora">'+data.hora+'</div><div class="fecha">'+data.fecha+'</div>'+data.nota+'</div>');
			var	button = $('.btn_notas[avaluo_id="'+data.avaluo_id+'"]');
			button.empty();
			button.append('<i>'+data.cantidad+'</i>💬');

			for (var i = 0; i <=document.getElementsByClassName("nota").length; i++) {
				var dato = document.getElementsByClassName("nota")[i];
				document.getElementsByName('nota')[i].style.backgroundColor = "#FFFFFF";
				document.getElementById('nota_id').value = '';				
			}
		},
		error: function(data){
			console.log('Error/'+data.status);
		},
		complete: function(data){
			var height2 = $('.contenedor_nota').height();
			var h = height2 - height;
			$(".contenedor_nota").animate({top: "-="+h},'fast');
			scroll_top_note();
		}
	});
});
function scroll_top_note(){
	var div = $('.scroll>div:first-child');
	var el_mas_alto = div.offset().top;
	if (el_mas_alto<0) {
		el_mas_alto = el_mas_alto* -1;
	}
	var este = $(".scroll>div:last-child").offset().top;
	var top = parseInt(el_mas_alto) + parseInt(este);
	$('.scroll').animate({ scrollTop: top },500);
}
$('.post_ajax').on('submit',function(e) {
	e.preventDefault(e);
	var form = $(this);
	$.ajax({
		type:"POST",
		url:form.attr("action"),
		data:form.serialize(),
		dataType: 'json',
		success: function(response){
			if (!response.data) {
				form.find('input[type="submit"]').addClass('btn_desactivar');
			} else {
				form.find('input[type="submit"]').removeClass('btn_desactivar');
			}
			$('a.lupa[file_id="'+response.id+'"]').attr('disable',response.data);
		},
		error: function(response){
			console.log(response.status);
		}
	});
});

function respondernota(nota_id) {
	if(document.getElementById('nota_id').value != ''){
		document.getElementById('nota_id').value = '';	
		for (var i = 0; i <=document.getElementsByClassName("nota").length; i++) {
			var dato = document.getElementsByClassName("nota")[i];
			document.getElementsByName('nota')[i].style.backgroundColor = "#FFFFFF";				
		}
	}
	else{
		document.getElementById('nota_id').value = nota_id;		
		document.getElementById(nota_id).style.backgroundColor = "#b9afaf";		
	}
	document.getElementById('nota').focus();

}

function dragStart(event) {
	event.dataTransfer.setData("Text", event.target.id);

}

function dragEnd(event,nota_id) {
	if(document.getElementById('nota_id').value != ''){
		document.getElementById('nota_id').value = '';	
		for (var i = 0; i <=document.getElementsByClassName("nota").length; i++) {
			var dato = document.getElementsByClassName("nota")[i];
			document.getElementsByName('nota')[i].style.backgroundColor = "#FFFFFF";	
			document.getElementById(nota_id).style.transform="translateX(0px)";				
		}
	}
	else{
		document.getElementById('nota_id').value = nota_id;		
		document.getElementById(nota_id).style.backgroundColor = "#b9afaf";	
		document.getElementById(nota_id).style.transform="translateX(0px)";	
	}
	document.getElementById('nota').focus();
}

function allowDrop(event) {
	event.preventDefault();
}
function touchStart(nota_id) {
	document.getElementById("scroll-notas").style='overflow-x:hidden';
	document.getElementById(nota_id).style.transform="translateX(15px)";
}
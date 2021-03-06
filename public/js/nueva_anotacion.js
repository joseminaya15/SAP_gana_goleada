function nuevaAnotacion(){
	var empresa     = $('#empresa').val();
	var deal_regis  = $('#deal_regis').val();
	var descripcion = $('#descripcion').val();
	var pais 	    = $('#pais').val();
	var fecha 	    = $('#fecha').val();
	var servicio    = '';

	if(empresa == '' || empresa == null){
		msj('error', 'Ingrese su empresa');
		return;
	}
	if(pais == '' || pais == null){
		msj('error', 'Ingrese el pais');
		return;
	}
	if(tab == 1) {
		if(nameAnotacion == null || nameAnotacion == ''){
			nameAnotacion = '# Oportunidades generadas para B1';
		}
		if(puntosGoles == null || puntosGoles == ''){
			puntosGoles = 4;
		}
		if(nameAnotacion == '# Oportunidades generadas para B1' || nameAnotacion == '# Campañas ejecutadas desde la Agencia Virtual' || nameAnotacion == 'Casos de Referencias de B1 aprobados por SAP'){
			servicio = nameAnotacion;
		}
	}else {
		if(deal_regis == '' || deal_regis == null){
			msj('error', 'Ingrese el Deal Registration ID');
			return;
		}
		if(deal_regis.length < 6){
			msj('error', 'Ingrese un código de 6 dígitos');
			return;
		}
		if(deal_regis.substring(0, 2) < 17){
			msj('error', 'Su código debe iniciar con un número mayor a 17');
			return;
		}
		/*if(descripcion.length > 500){
			msj('error', 'La descripcion debe contener menos de 500 caracteres');
			return;
		}*/
		if(fecha == null || fecha == ''){
			msj('error', 'Ingrese la fecha');
		}
		if(nameAnotacion == null || nameAnotacion == ''){
			servicio = 'Won & Booked (W/B)';
		}else {
			if(nameAnotacion == 'Cuentas nuevas (NNN)'){
				servicio = 'Cuentas nuevas (NNN)';
			}if(nameAnotacion == 'Oportunidades generadas para Cloud'){
				servicio = 'Oportunidades generadas para Cloud';
			}if(nameAnotacion == 'Oportunidades generadas de Social Selling'){
				servicio = 'Oportunidades generadas de Social Selling';
			}if(nameAnotacion == 'Casos de successo aprovados (clientes)*'){
				servicio = 'Casos de éxitos de clientes aprobados*';
			}
		}
		if(puntosGoles == null || puntosGoles == ''){
			puntosGoles = 4;
		}
	}
	$('#idNuevaAnotacion').prop("disabled", true);
	$.ajax({
		data : {empresa     : empresa,
				deal_regis  : deal_regis,
				descripcion : descripcion,
				pais 	    : pais,
				fecha 	    : fecha,
				goles 	    : puntosGoles,
				servicio    : servicio},
		url  : 'Nueva_anotacion/nuevaAnotacion',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
				$('#empresa').val("");
				$('#deal_regis').val("");
				$('#descripcion').val("");
				$('#pais').val("");
				$('#fecha').val("");
				msj('error', 'Se registró correctamente su anotación');
				$('#idNuevaAnotacion').prop("disabled", false);
	        }else {
	        	msj('error', data.msj);
	        	return;
	        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function soloLetras(e){
    key 	   	   = e.keyCode || e.which;
    tecla 	   	   = String.fromCharCode(key).toLowerCase();
    letras     	   = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales 	   = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    patron 		=/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
  	if ((campo.match(RegExPattern)) && (campo!='')) {
        return true;
  	} else {
        return false;
  	}
}
function existeFecha(fecha){
      var fechaf = fecha.split("/");
      var day 	 = fechaf[0];
      var month  = fechaf[1];
      var year   = fechaf[2];
      var date   = new Date(year,month,'0');
      if((day-0)>(date.getDate()-0)){
            return false;
      }
      return true;
}
var nameAnotacion = null;
var puntosGoles   = null;
var card          = $('.mdl-card-cuentas');
var idLocal 	  = '';
function selectAnotacion(id){
	if(idLocal != id){
		$('#deal_regis').val('');
	}
	if(id == 'oportunidadb1'){
		$('#descripcion').attr('placeholder', 'Detalle nombre, teléfono y mail del contacto del cliente');
	} else {
		$('#descripcion').attr('placeholder', 'Descripción');
	}
	if (id == 'oportunidad' || id == 'social_selling') {
		$('#deal_regis').attr('maxlength', '10');
	} else {
		$('#deal_regis').attr('maxlength', '6');
	}
	idLocal = id;
	var idButton = $('#'+id);
	var name     = idButton.parents('.mdl-puntos').find('.name-anotacion').find('p').text();
	var puntos   = idButton.parents('.mdl-puntos').find('.punto-imagen').html();
	var goles    = idButton.parents('.mdl-puntos').find('.punto-imagen').children().length;
	card.find('.mdl-card__title').find('h2').text(name);
	card.find('.mdl-card__title').find('.numero-goles').html(puntos);
	nameAnotacion = name;
	puntosGoles = goles;
	$('.info').removeClass('show');
}
$('#caso').click(function() {
	$('.info').addClass('show');
});
function cerrarCesion(){
	$.ajax({
		url  : 'Nueva_anotacion/cerrarCesion',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	location.href = 'Login';
        }else {
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function restringirNum(){
	var cadenaAnalizar = $('#deal_regis').val();
	var cadena1 = cadenaAnalizar.charAt(0);
	var cadena2 = parseInt(cadenaAnalizar.charAt(0))+1;
	var cadena3 = parseInt(cadenaAnalizar.charAt(0))+2;
	var cadena4 = parseInt(cadenaAnalizar.charAt(0))+3;
	var cadena5 = parseInt(cadenaAnalizar.charAt(0))+4;
	var cadena6 = parseInt(cadenaAnalizar.charAt(0))+5;
	if(cadenaAnalizar.length != 0){
		if(cadenaAnalizar.charAt(0) == cadenaAnalizar.charAt(1) && cadenaAnalizar.charAt(1) == cadenaAnalizar.charAt(2) 
			&& cadenaAnalizar.charAt(2) == cadenaAnalizar.charAt(3) && cadenaAnalizar.charAt(3) == cadenaAnalizar.charAt(4) 
			&& cadenaAnalizar.charAt(4) == cadenaAnalizar.charAt(5)){
			msj('error', 'Los código no pueden ser los mismos');
			return;
		}
		if(parseInt(cadena1)+0 == cadenaAnalizar.charAt(0) && cadena2 == cadenaAnalizar.charAt(1) && cadena3 == cadenaAnalizar.charAt(2) 
			&& cadena4 == cadenaAnalizar.charAt(3) && cadena5 == cadenaAnalizar.charAt(4) && cadena6 == cadenaAnalizar.charAt(5)){
			msj('error', 'El código no pueden ser consecutivos');
			return;
		}
		if(cadenaAnalizar.substring(0, 2) < 17){
			msj('error', 'Su código debe iniciar con un número mayor a 17');
			return;
		}
	}else {
		if(cadenaAnalizar.length < 6){
			msj('error', 'Ingrese un código de 6 dígitos');
			return;
		}
	}
}
var tab = 0;
function selectTab(id){
	if(id == 'sap') {
		$('#descripcion').attr('placeholder', 'Detalle nombre, teléfono y mail del contacto del cliente');
	} else {
		$('#descripcion').attr('placeholder', 'Deal Registration ID');
	}
	var idPanel      = $('#Tab'+id);
	card.find('.mdl-card__title').find('h2').text();
	idPanel.find('.mdl-puntos').find('.mdl-radio').removeClass('is-checked');
	idPanel.find('.mdl-puntos:nth-child(1)').find('.mdl-radio').addClass('is-checked');
	var nameChecked  = idPanel.find('.mdl-puntos').find('.mdl-radio.is-checked');
	var titleChecked = nameChecked.parents('.mdl-puntos').find('.name-anotacion').find('p').text();
	card.find('.mdl-card__title').find('h2').text(titleChecked);
	$('#deal_regis').fadeIn('fast');
	$('#descripcion').fadeOut('fast');
	$('.info').removeClass('show');
	tab = 1;
}
$('#sap').click(function() {
	$('#deal_regis').fadeOut('fast');
	$('#descripcion').fadeIn('fast');
});
function nuevaAnotacion(){
	var empresa    = $('#empresa').val();
	var deal_regis = $('#deal_regis').val();
	var pais 	   = $('#pais').val();
	var fecha 	   = $('#fecha').val();
	//var goles 	   = $('#goles').val();
	if(empresa == '' || empresa == null){
		msj('error', 'Ingrese su empresa');
		return;
	}
	if(deal_regis == '' || deal_regis == null){
		msj('error', 'Ingrese el Deal Registration ID');
		return;
	}
	if(pais == '' || pais == null){
		msj('error', 'Ingrese el pais');
		return;
	}
	if(fecha == null || fecha == ''){
		msj('error', 'Ingrese la fecha');
	}
	if(nameAnotacion == null || nameAnotacion == ''){
		nameAnotacion = 'Cuentas nuevas (NNN)';
	}
	if(puntosGoles == null || puntosGoles == ''){
		puntosGoles = 3;
	}
	$.ajax({
		data : {empresa    : empresa,
				deal_regis : deal_regis,
				pais 	   : pais,
				fecha 	   : fecha,
				goles 	   : puntosGoles,
				servicio   : nameAnotacion},
		url  : 'Nueva_anotacion/nuevaAnotacion',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        console.log(data);
	        if(data.error == 0){
				$('#empresa').val("");
				$('#deal_regis').val("");
				$('#pais').val("");
				$('#fecha').val("");
				msj('error', 'Se registró correctamente su anotación');
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
      var day = fechaf[0];
      var month = fechaf[1];
      var year = fechaf[2];
      var date = new Date(year,month,'0');
      if((day-0)>(date.getDate()-0)){
            return false;
      }
      return true;
}
var nameAnotacion = null;
var puntosGoles = null;
function selectAnotacion(id){
	var idButton = $('#'+id);
	var card     = $('.mdl-card-cuentas');
	var name     = idButton.parents('.mdl-puntos').find('.name-anotacion').find('p').text();
	var puntos   = idButton.parents('.mdl-puntos').find('.punto-imagen').html();
	var goles    = idButton.parents('.mdl-puntos').find('.punto-imagen').children().length;
	card.find('.mdl-card__title').find('h2').text(name);
	card.find('.mdl-card__title').find('.numero-goles').html(puntos);
	nameAnotacion = name;
	puntosGoles = goles;
}
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
function nuevaAnotacion(){
	var empresa    = $('#empresa').val();
	var deal_regis = $('#deal_regis').val();
	var pais 	   = $('#pais').val();
	var fecha 	   = $('#fecha').val();
	//var goles 	   = $('#goles').val();
	var id_serv	   = null;
	if(empresa == '' || empresa == null){
		msj('error', 'Ingrese su empresa');
		return;
	}
	if(deal_regis == '' || deal_regis == null){
		msj('error', 'Ingrese su empresa');
		return;
	}
	if(pais == '' || pais == null){
		msj('error', 'Ingrese su empresa');
		return;
	}
	if(empresa == '' || empresa == null){
		msj('error', 'Ingrese su empresa');
		return;
	}
	/*if(servicio == 'Cuentas Nuevas'){
		id_serv = 1;
	}else if(servicio == 'Social Selling'){
		id_serv = 2;
	}else if(servicio == 'Cloud'){
		id_serv = 3;
	}else if(sevicio == 'clientes aprovados'){
		id_serv = 4;
	}else if(servicio == 'Won & Booked'){
		id_serv = 5;
	}*/
	$.ajax({
		data : {empresa    : empresa,
				deal_regis : deal_regis,
				pais 	   : pais,
				fecha 	   : fecha/*,
				goles 	   : goles,
				id_serv    : id_serv*/},
		url  : 'Nueva_anotacion/nuevaAnotacion',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
				$('#empresa').val("");
				$('#deal_regis').val("");
				$('#pais').val("");
				$('#flag').val("");
				$('#goles').val("");
	        }else {
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
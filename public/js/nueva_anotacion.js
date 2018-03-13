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
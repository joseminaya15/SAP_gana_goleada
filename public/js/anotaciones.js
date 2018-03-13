function nuevaAnotacion(){
	var id_serv	   = null;

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
		data : {id_serv : id_serv},
		url  : 'Anotaciones/getDatosAnotaciones',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        }else {
	        	return;
	        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function nuevaAnotacion(id){
	var servicio = $( "input:checked" ).val();
	$.ajax({
		data : {id_serv : servicio},
		url  : 'Anotaciones/getDatosAnotaciones',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        	$('#data_tabla').html('');
	        	$('#data_tabla').append(data.tabla);
	        }else {
	        	return;
	        }
      }catch(err){
        msj('error',err.message);
      }
	});
	var idButton = $('#'+id);
	var card     = $('.mdl-card-cuentas');
	var name     = idButton.parents('.mdl-puntos').find('.name-anotacion').find('p').text();
	card.find('.mdl-card__title').find('h2').text(name);
}
function cerrarCesion(){
	$.ajax({
		url  : 'Anotaciones/cerrarCesion',
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
var aprobado  = 'aprobado';
var contacto  = 'contacto';
var rechazado = 'rechazado';
var modalAlert = $('#modalAlerta');
function showModalAlert(dato){
	var nameTitle   = modalAlert.find('.mdl-card__title').find('h2');
	var description = modalAlert.find('.mdl-card__supporting-text');
<<<<<<< Updated upstream
	if(dato == 1){
		nameTitle.text('Contáctanos');
		description.html('<p>Queremos ponernos en contacto con usted, por favor escribirnos a <a href="mailto:carina.gonzales@sap.com">mailto:carina.gonzales@sap.com</a></p>');
	}else if(dato == 2) {
		nameTitle.text('¡Metiste Goles!');
		description.html('<p>Su oportunidad ha sido aceptada</p>');
	}else if(dato == 3) {
		nameTitle.text('¡Goles Rechazados!');
		description.html('<p>Su oportunidad ha sido rechazada, por favor ponerse en contacto con <a href="mailto:carina.gonzales@sap.com">mailto:carina.gonzales@sap.com</a></p>');
	}
	modalAlert.modal('show');
}
function closeModal(){
    modalAlert.modal('hide');
=======
	$.ajax({
		url  : 'Anotaciones/showModalAlert',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	if(dato == 1){
        		nameTitle.text('Contáctanos');
        		description.html('<p>Queremos ponernos en contacto con usted, por favor escribirnos a <a href="mailto:carina.gonzales@sap.com">carina.gonzales@sap.com</a></p>');
        	}else if(dato == 2) {
        		nameTitle.text('¡Metiste Goles!');
        		description.html('<p>Su oportunidad ha sido aceptada</p>');
        	}else if(dato == 3) {
        		nameTitle.text('¡Goles Rechazados!');
        		description.html('<p>Su oportunidad ha sido rechazada, por favor ponerse en contacto con <a href="mailto:carina.gonzales@sap.com">carina.gonzales@sap.com</a></p>');
        	}
			modalAlert.modal('show');
        }else {
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function closeModal(){
	modalAlert.modal('hide');
	$('.mdl-button').removeClass('message');
>>>>>>> Stashed changes
}
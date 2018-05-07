var card     = $('.mdl-card-cuentas');
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
var conteo    = null;
function showModalAlert(dato,contador, id){
	conteo = contador;
	var nameTitle   = modalAlert.find('.mdl-card__title').find('h2');
	var description = modalAlert.find('.mdl-card__supporting-text');
	if(dato == 1){
		nameTitle.text('Contact us');
		description.html('<p>We want to get in touch with you, please write to us at <a href="mailto:carina.gonzales@sap.com">carina.gonzales@sap.com</a></p>');
	}else if(dato == 2) {
		nameTitle.text('¡You scored goals!');
		description.html('<p>Your opportunity has been accepted</p>');
	}else if(dato == 3) {
		nameTitle.text('¡Goals Rejected!');
		description.html('<p>Your opportunity has been rejected, please get in touch with <a href="mailto:carina.gonzales@sap.com">carina.gonzales@sap.com</a></p>');
	}
	$.ajax({
		data : {id : id},
		url  : 'Anotaciones/showModalAlert',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
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
	$('#buttonAlert'+conteo).removeClass('message');
}
function selectTab(id){
	var idPanel      = $('#Tab'+id);
	card.find('.mdl-card__title').find('h2').text();
	idPanel.find('.mdl-puntos').find('.mdl-radio').removeClass('is-checked');
	idPanel.find('.mdl-puntos:nth-child(1)').find('.mdl-radio').addClass('is-checked');
	var nameChecked  = idPanel.find('.mdl-puntos').find('.mdl-radio.is-checked');
	var titleChecked = nameChecked.parents('.mdl-puntos').find('.name-anotacion').find('p').text();
	card.find('.mdl-card__title').find('h2').text(titleChecked);
}
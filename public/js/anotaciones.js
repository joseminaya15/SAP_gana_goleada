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
function showModalAlert(dato,contador){
	conteo = contador;
	var nameTitle   = modalAlert.find('.mdl-card__title').find('h2');
	var description = modalAlert.find('.mdl-card__supporting-text');
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
<<<<<<< Updated upstream
function cambiarTabla(){
=======
function nuevaAnotacion(id){
>>>>>>> Stashed changes
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
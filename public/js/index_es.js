function registrar() {
	var nombre 	 = $('#nombre').val();
	var password = $('#password').val();
	var canal 	 = $('#canal').val();
	var correo   = $('#correo').val();
	var pais 	 = $('#pais').val();
	if(nombre == null){
		msj('error', 'Ingrese el nombre');
		return;
	}
	if(password == null){
		msj('error', 'Ingrese su contraseña');
		return;
	}
	if(canal == null){
		msj('error', 'Ingrese su canal');
		return;
	}
	if(correo == null){
		msj('error', 'Ingrese su correo');
		return;
	}
	if (!validateEmail(correo)){
		$('#correo').css('border-color','red');
		return;
	}
	if(pais == null){
		msj('error', 'Ingrese su país');
		return;
	}
	$.ajax({
		data : {nombre 	 : nombre,
				canal 	 : canal,
				usuario  : correo,
				password : password,
				pais 	 : pais},
		url  : 'registro/registrar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	$('#nombre').val("");
			$('#password').val("");
			$('#canal').val("");
			$('#correo').val("");
			$('#pais').val("");
			msj('error', 'Se registró correctamente');
        }else {
			$('#usuario').parent().addClass('is-invalid');
			$('#password').parent().addClass('is-invalid');
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}

function soloLetras(e){
    key 	     = e.keyCode || e.which;
    tecla 	   = String.fromCharCode(key).toLowerCase();
    letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
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
    patron      =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
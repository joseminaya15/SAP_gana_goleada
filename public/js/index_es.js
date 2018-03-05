function registrar() {
	var nombre 	 = $('#nombre').val();
	var password = $('#password').val();
	var canal 	 = $('#canal').val();
	var correo   = $('#correo').val();
	var pais 	 = $('#pais').val();
	if(nombre == '' && canal == '' && canal == '' && correo == '' && pais == ''){
		msj('error', 'Ingrese sus datos');
		return;
	}
	if(nombre == null || nombre == undefined || nombre == ''){
		msj('error', 'Ingrese el nombre del capitán');
		return;
	}
	if(canal == ''){
		msj('error', 'Ingrese su canal');
		return;
	}
	if(pais == ''){
		msj('error', 'Ingrese su país');
		return;
	}
	if(correo == ''){
		msj('error', 'Ingrese su correo');
		return;
	}
	if (!validateEmail(correo)){
		msj('error', 'El formato del correo es incorrecto');
		return;
	}
	if(password == ''){
		msj('error', 'Ingrese su contraseña');
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
			msj('error', 'Su usuario o contraseña son incorrectas');
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
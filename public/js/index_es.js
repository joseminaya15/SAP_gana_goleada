function registrar() {
	var nombre 	 = $('#nombre').val();
	var password = $('#password').val();
	var canal 	 = $('#canal').val();
	var correo   = $('#correo').val();
	var pais 	 = $('#pais').val();
	var partner  = $('#partner').val();
	var terminos = $('#checkbox-1').is(':checked');
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
	if(terminos == false){
		msj('error', 'Acepte los términos y condiciones');
		return;
	}
	$.ajax({
		data : {nombre 	 : nombre,
				canal 	 : canal,
				usuario  : correo,
				password : password,
				pais 	 : pais,
				partner  : partner},
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
			$('#partner').val("")
			msj('error', 'Se registró correctamente');
			setTimeout(function(){ 
				location.href = "Login";
			}, 1500);
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
    key 	   = e.keyCode || e.which;
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
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function cerrarCesion(){
	$.ajax({
		url  : 'Menu/cerrarCesion',
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
function goToMenu(id){
	location.href = id;
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
function cambiarPais(){
	var pais = $('#pais').val();
	var combo = '';
	if(pais == 'Colombia'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Ecuador'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Venezuela'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Venezuela">Venezuela - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Costa rica'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'El salvador'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Honduras'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Nicaragua'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Panamá'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Puerto rico'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'República dominicana'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Argentina'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Bolivia'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Chile'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Chile">Chile - Sur</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Perù'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Perù">Perù - Sur</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Paraguay'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Uruguay'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Uruguay">Uruguay</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'Brasil'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="Brasil">Brasil</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="México">México</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else if(pais == 'México'){
            combo = '<select class="selectpicker" id="pais" onchange="cambiarPais();" style="display: block !important">'+
            			'<option value="México">México</option>'+
                        '<option value="Argentina">Argentina - Sur</option>'+
                        '<option value="Bolivia">Bolivia - Sur</option>'+
                        '<option value="Brasil">Brasil</option>'+
                        '<option value="Chile">Chile - Sur</option>'+
                        '<option value="Colombia">Colombia - Norte</option>'+
                        '<option value="Costa rica">Costa rica - Norte</option>'+
                        '<option value="Ecuador">Ecuador - Norte</option>'+
                        '<option value="El salvador">El salvador - Norte</option>'+
                        '<option value="Honduras">Honduras - Norte</option>'+
                        '<option value="Nicaragua">Nicaragua - Norte</option>'+
                        '<option value="Panamá">Panamá - Norte</option>'+ 
                        '<option value="Paraguay">Paraguay - Sur</option>'+ 
                        '<option value="Perù">Perù - Sur</option>'+
                        '<option value="Puerto rico">Puerto rico - Norte</option>'+
                        '<option value="República dominicana">República dominicana - Norte</option>'+
                        '<option value="Uruguay">Uruguay</option>'+
                        '<option value="Venezuela">Venezuela - Norte</option>'+
                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }
}
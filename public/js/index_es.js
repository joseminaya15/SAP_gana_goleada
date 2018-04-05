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
	var combPatn = '';
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1139181">ADP Consultores S.A.S. - 1139181</option>'+
	                        '<option value="1426890">Ayesa Advanced Technologies S.A. - 1426890</option>'+
	                        '<option value="1557688">BD ADVISORY S.A.S - 1557688</option>'+
	                        '<option value="496515">Carvajal Propiedades e Inversiones S.A. - 496515</option>'+
	                        '<option value="1050870">Celeritech Solutions Sucursal - 1050870</option>'+
	                        '<option value="635303">CompuNet, S.A. - 635303</option>'+
	                        '<option value="774362">Consensus S.A.S. - 774362</option>'+
	                        '<option value="664870">Consultoría Organizacional S.A.S. - 664870</option>'+
	                        '<option value="1214071">Crystal Colombia S.A.S. - 1214071</option>'+
	                        '<option value="1507653">EPI USE COLOMBIA SAS - 1507653</option>'+
	                        '<option value="1364382">Exxis Colombia SAS - 1364382</option>'+
	                        '<option value="1709633">Gran Panda SAS - 1709633</option>'+
	                        '<option value="684898">HR Solutions S.A.S. - 684898</option>'+
	                        '<option value="828296">Heinsohn Business Technology S.A. - 828296</option>'+
	                        '<option value="33661">IBM De Colombia & Cia. S.C.A. - 33661</option>'+
	                        '<option value="1349126">IG Biz Solutions SAS - 1349126</option>'+
	                        '<option value="1709387">INFOSECURE ASESORIAS PROFESIONALES S A S - 1709387</option>'+
	                        '<option value="896298">Impresistem S.A. - 896298</option>'+
	                        '<option value="1593377">Informatica El Corte Ingles S.A. - 1593377</option>'+
	                        '<option value="698634">MQA BUSINESS CONSULTANTS S A - 698634</option>'+
	                        '<option value="1140859">MSS Seidor Colombia S.A.S. - 1140859</option>'+
	                        '<option value="1259597">MTBase S.A.S. - 1259597</option>'+
	                        '<option value="1785611">Mundo Cloud S.A.S - 1785611</option>'+
	                        '<option value="445061">Neoris Colombia S.A.S. - 445061</option>'+
	                        '<option value="1355042">Netw Consulting SAS - 1355042</option>'+
	                        '<option value="1790905">Network Consulting Group Colombia SAS - 1790905</option>'+
	                        '<option value="828293">Novasoft S.A.S. - 828293</option>'+
	                        '<option value="657493">Projection Core Consulting S.A.S. - 657493</option>'+
	                        '<option value="1357254">Seidor Colombia SAS - 1357254</option>'+
	                        '<option value="282172">Softtek Renovation Ltda. - 282172</option>'+
	                        '<option value="498849">TIVIT COLOMBIA TERCERIZACION DE PROCESOS - 498849</option>'+
	                        '<option value="1568827">Vivo Consulting Colombia SAS - 1568827</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1283028">AEKANSA S.A. - 1283028</option>'+
	                        '<option value="1717249">Abside Ecuador S.A. - 1717249</option>'+
	                        '<option value="1427001">Ayesa Advanced Technologies - 1427001</option>'+
	                        '<option value="1663519">Chain Services TI Cia Ltda - 1663519</option>'+
	                        '<option value="1252117">ECUATECXXIS S.A. - 1252117</option>'+
	                        '<option value="1729341">ENTAEH360.S.A. - 1729341</option>'+
	                        '<option value="1329497">Heinsohntech S.A. - 1329497</option>'+
	                        '<option value="1181157">IBM del Ecuador S.A. - 1181157</option>'+
	                        '<option value="1224700">MQA Dos Soluciones Empresariales S.A. - 1224700</option>'+
	                        '<option value="999062">Noux C.A. - 999062</option>'+
	                        '<option value="1702470">One Solutions-Provedatos, S.A. - 1702470</option>'+
	                        '<option value="1554412">Seidor S.A. - 1554412</option>'+
	                        '<option value="1581998">Software Mysiss Del Ecuador S.A. - 1581998</option>'+
	                        '<option value="1177587">Sonda del Ecuador S.A. - 1177587</option>'+
	                        '<option value="1709339">T&SCorp. Cia. LTDA - 1709339</option>'+
	                        '<option value="1274843">UNIPLEX S.A. - 1274843</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1283028">B1 Consulting, C.A. - 821134</option>'+
	                        '<option value="1717249">CORPORACION SYBVEN C.A. - 987087</option>'+
	                        '<option value="1427001">Celeritech Solutions C.A. - 821107</option>'+
	                        '<option value="1663519">Corporacion Abside S.A. - 1504534</option>'+
	                        '<option value="1252117">CsCorp Consultoria de Sistemas - 726921</option>'+
	                        '<option value="1729341">ENIAC EMPRESA NACIONAL DE INFORMATICA - 1329502</option>'+
	                        '<option value="1329497">Feedback Associates, C.A. - 478164</option>'+
	                        '<option value="1181157">GRAM & Asociados, C.A. - 681313</option>'+
	                        '<option value="1224700">IT Sales, C.A. - 1026824</option>'+
	                        '<option value="999062">Inversiones NCG Solutions, S.A. - 1260174</option>'+
	                        '<option value="1702470">LatCapital de Venezuela, C.A. - 705915</option>'+
	                        '<option value="1554412">MMD Management Consulting - 827322</option>'+
	                        '<option value="1581998">N&B Team Consulting, C.A. - 878520</option>'+
	                        '<option value="1177587">Orion Consultores C.A. - 924494</option>'+
	                        '<option value="1709339">SOFOS, C.A. - 362109</option>'+
	                        '<option value="1274843">Sistemas Edmasoft C.A. - 345172</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1381993">Axento Investments - 1381993</option>'+
	                        '<option value="825471">BD Consultores Costa Rica S.A. - 825471</option>'+
	                        '<option value="1716327">Business Investments Blue Angel S.A. - 1716327</option>'+
	                        '<option value="1040817">Crystalis Centroamérica, S.A. - 1040817</option>'+
	                        '<option value="1389325">Intellego Business Intelligence - 1389325</option>'+
	                        '<option value="1188452">Novitec Consultores en Aplicaciones SA - 1188452</option>'+
	                        '<option value="1041408">Seidor Crystalis Costa Rica - 1041408</option>'+
	                        '<option value="1359063">Servicios de Informática Lexington S.A. - 1359063</option>'+
	                        '<option value="680999">Software & Consulting Group CR, S.A. - 680999</option>'+
	                        '<option value="999073">Soin Soluciones Integrales, S.A. - 999073</option>'+
	                        '<option value="1606297">Vivo Global Services Costa Rica S.A - 1606297</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1056550">Grupo EJJE SA de CV - 1056550</option>'+
	                        '<option value="742210">Inforum El Salvador, S.A. de C.V. - 742210</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1605368">Axento Honduras S.A. - 1605368</option>'+
	                        '<option value="1318032">Foro de Información S.A. de C.V. - 1318032</option>'+
	                        '<option value="1574848">International Technology Group S.A. - 1574848</option>'+
	                        '<option value="709174">Sistemas Abiertos, S.A. de C.V. - 709174</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1605368">Lat Capital Solutions Sociedad Anónima - 834315</option>'+
	                        '<option value="1318032">Roberto Terán G. Comercial S.A. - 1326361</option>'+
	                        '<option value="1574848">Servicios de Informatica Nicaraguenses - 1588676</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1507730">Axento Panamá S.A. - 1507730</option>'+
	                        '<option value="1561760">Celeritech Panama, S.A. - 1561760</option>'+
	                        '<option value="1010561">Cibernetica, S.A. - 1010561</option>'+
	                        '<option value="761739">Dream Tech, S.A. - 761739</option>'+
	                        '<option value="1298647">IMR, S.A. - 1298647</option>'+
	                        '<option value="1574282">Informática El Corte Inglés. - 1574282</option>'+
	                        '<option value="871640">Integrated Systems - 871640</option>'+
	                        '<option value="1048960">MQA AMERICAS CORP - 1048960</option>'+
	                        '<option value="1581670">Orión Consultores Panamá S.A. - 1581670</option>'+
	                        '<option value="1595177">Seidor Panama S.A. - 1595177</option>'+
	                        '<option value="666339">Topmanage de Panamá, S.A. - 666339</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1707803">ABSIDE, INC - 1707803</option>'+
	                        '<option value="1306447">Advanced Consulting Puerto Rico LLC - 1306447</option>'+
	                        '<option value="1246027">Argentis Consulting Services, Inc - 1246027</option>'+
	                        '<option value="1740868">C2S, Consulting LLC - 1740868</option>'+
	                        '<option value="1115777">N&B Team Consulting - 1115777</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="872304">Addvisory Group Caribe SRL - 872304</option>'+
	                        '<option value="1467741">CEO Consultoría, S.R.L - 1467741</option>'+
	                        '<option value="1170966">Crystal Solutions del Caribe, SRL - 1170966</option>'+
	                        '<option value="698710">DT Solutions C. por A. - 698710</option>'+
	                        '<option value="782187">GBM Dominicana, S.A. - 782187</option>'+
	                        '<option value="1493484">Hrizons, SRL - 1493484</option>'+
	                        '<option value="1249681">ITGES - 1249681</option>'+
	                        '<option value="1716337">MQA AMERICAS CARIBE - 1716337</option>'+
	                        '<option value="875008">Netrix Caribe, S.A. - 875008</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="452461">ADP Consultores S.R.L. - 452461</option>'+
	                        '<option value="923988">BAITCON S.A. - 923988</option>'+
	                        '<option value="1330489">BCI Consulting SRL - 1330489</option>'+
	                        '<option value="485342">Consultoria en Tecnologia de Informacion - 485342</option>'+
	                        '<option value="922593">Crystal Solutions S.A. - 922593</option>'+
	                        '<option value="1524508">DbTrust Consulting - 1524508</option>'+
	                        '<option value="513420">Deloitte & Co. S.A. - 513420</option>'+
	                        '<option value="1697412">EPI-USE Argentina S.A. - 1697412</option>'+
	                        '<option value="1258072">Hexagon Consulting S.R.L. - 1258072</option>'+
	                        '<option value="726439">IBM ARGENTINA SRL - 726439</option>'+
	                        '<option value="1317121">Inclusion Services S.A. - 1317121</option>'+
	                        '<option value="1178339">Latinware S.A. - 1178339</option>'+ 
	                        '<option value="1199947">Nearshore Argentina S.A. - 1199947</option>'+ 
	                        '<option value="881376">Neoris Consulting Argentina S.A - 881376</option>'+
	                        '<option value="773804">Process Technologies S.A. - 773804</option>'+
	                        '<option value="197692">Seidor Consulting SA - 197692</option>'+
	                        '<option value="902528">Synapsis Argentina SRL - 902528</option>'+
	                        '<option value="757182">abc Consulting S.A. - 757182</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1252859">Actualisap Consultores Bolivia S.A. - 1252859</option>'+
	                        '<option value="1618689">Exxis Bolivia S.R.L. - 1618689</option>'+
	                        '<option value="1611754">Top Consulting Group Peru S.A.C. - 1611754</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="828111">ADP Consultores Ltda. - 828111</option>'+
	                        '<option value="847784">ALYNEA Asesorias y Consultorias Limitada - 847784</option>'+
	                        '<option value="1330489">Business Online Consulting Chile S.A - 1330489</option>'+
	                        '<option value="760219">Consultoria en Tecnologia de Informacion - 760219</option>'+
	                        '<option value="1359731">Consultora ISAP limitada - 1359731</option>'+
	                        '<option value="1106638">Crystal Solutions S.A. - 1106638</option>'+
	                        '<option value="513420">Deloitte & Co. S.A. - 513420</option>'+
	                        '<option value="1413825">Datco Chile S.A. - 1413825</option>'+
	                        '<option value="472268">Deloitte Servicios Profesionales Ltda - 472268</option>'+
	                        '<option value="697739">EXXIS S.A. - 697739</option>'+
	                        '<option value="1201134">Henley SpA - 1201134</option>'+
	                        '<option value="165391">IBM de Chile S.A.C. - 165391</option>'+ 
	                        '<option value="1361695">INXAP SPA - 1361695</option>'+ 
	                        '<option value="970487">Indra Sistemas Chile S.A. - 970487</option>'+
	                        '<option value="1337054">Infosecure Asesorias Profesionales - 1337054</option>'+
	                        '<option value="705762">Neoris de Chile Ltda - 705762</option>'+
	                        '<option value="621373">Novis S.A. - 621373</option>'+
	                        '<option value="498928">Performance HR Consulting S.A. - 498928</option>'+
	                        '<option value="826671">Quintec Chile S.A. - 826671</option>'+
	                        '<option value="345283">SONDA S.A. - 345283</option>'+
	                        '<option value="850849">STK Softtek Chile Ltda - 850849</option>'+
	                        '<option value="1507742">SYPSOFT360 - 1507742</option>'+
	                        '<option value="750824">Seidor Chile S.A. - 750824</option>'+
	                        '<option value="1508806">Servicios Tecnologicos Performance HR - 1508806</option>'+
	                        '<option value="1274844">Tech One Group S.A. - 1274844</option>'+
	                        '<option value="697737">VISUAL KNOWLEDGE CHILE S.A. - 697737</option>'+
	                        '<option value="1633811">Wipro Technology Chile SpA - 1633811</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1539487">Axity Perú SAC. - 1539487</option>'+
	                        '<option value="1010552">BCTS Consulting S.A. - 1010552</option>'+
	                        '<option value="759692">Celeritech Solutions S.A.C. - 759692</option>'+
	                        '<option value="1223774">Chain Services TI S.A.C. - 1223774</option>'+
	                        '<option value="278533">Deloitte & Touche S.R.L. - 278533</option>'+
	                        '<option value="1310156">Everis Peru Sociedad Anonima Cerrada - 1310156</option>'+
	                        '<option value="1178907">Exxis Peru SAC - 1178907</option>'+
	                        '<option value="1654655">HC CONSULTING S.A.C. - 1654655</option>'+
	                        '<option value="182375">IBM del Peru S.A.C. - 182375</option>'+
	                        '<option value="1348080">MSS Seidor Peru SAC - 1348080</option>'+
	                        '<option value="1587630">Neoris Peru SAC - 1587630</option>'+
	                        '<option value="672351">Omnia Solution S.A.C. - 672351</option>'+ 
	                        '<option value="614852">Rivercon.com S.A.C. - 614852</option>'+ 
	                        '<option value="970697">Seidor Consulting Perú SAC. - 970697</option>'+
	                        '<option value="761121">Strat Consulting S.A.C. - 761121</option>'+
	                        '<option value="829654">Sypsoft S.A.C. - 829654</option>'+
	                        '<option value="1274883">System Database S.A. - 1274883</option>'+
	                        '<option value="1334497">Tecnocom Peru S.A.C. - 1334497</option>'+
	                        '<option value="507535">Tivit Peru Tercerizacion de Procesos - 507535</option>'+
	                        '<option value="1500788">Top Consulting Group Peru S.A.C - 1500788</option>'+
	                        '<option value="883699">Ventura Soluciones S.A.C. - 883699</option>'+
	                        '<option value="779762">Visual K Peru S.A.C. - 779762</option>'+
	                        '<option value="1595764">VisualK Negocios S.A.C. - 1595764</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
             combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1332292">Exxis Paraguay S.A. - 1332292</option>'+
	                        '<option value="886235">Infocenter - 886235</option>'+
	                        '<option value="1687709">Logicalis Paraguay S.A. - 1687709</option>'+
	                        '<option value="1093645">MBA S.A. - 1093645</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1316411">Aimor S.A. - 1316411</option>'+
	                        '<option value="756299">Invenzis (Marbus S.A.) - 756299</option>'+
	                        '<option value="1598312">Pyxis - 1598312</option>'+
	                        '<option value="922594">Seidor Uruguay Informatica S.A - 922594</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1076618">ABC TECHNOLOGY DESENVOLVIMENTO - 1076618</option>'+
	                        '<option value="1742601">ATA TECNOLOGIA E REPRESENTAÇÃO - 1742601</option>'+
	                        '<option value="206639">Accenture do Brasil Ltda. - 206639</option>'+
	                        '<option value="832880">Agile Business Applications - Soluções - 832880</option>'+
	                        '<option value="1673000">Alfa Sistemas de Gestao LTDA - 1673000</option>'+
	                        '<option value="1188663">Algar TI Consultoria - 1188663</option>'+
	                        '<option value="1512584">Alpama Global Services Brasil - 1512584</option>'+
	                        '<option value="1047048">Atos Serviços de Tecnologia - 1047048</option>'+
	                        '<option value="1057231">Avannt Consultoria em - 1057231</option>'+
	                        '<option value="1507672">Be One Solutions Brazil Ltda. - 1507672</option>'+
	                        '<option value="1580442">Boyum It Do Brasil Sistemas Ltda. - 1580442</option>'+
	                        '<option value="1708058">CAIO BRUNO RIBEIRO DO VALE - ME - 1708058</option>'+ 
	                        '<option value="1222340">COACH-IT Ass, Cons Inf LTDA - 1222340</option>'+ 
	                        '<option value="901993">CPM BRAXIS TECNOLOGIA LTDA. - 901993</option>'+
	                        '<option value="178248">CSC Computer Sciences Brasil S.A. - 178248</option>'+
	                        '<option value="1511627">CVA SERVICOS EM TECNOLOGIA DA INFORMACAO - 1511627</option>'+
	                        '<option value="486145">Capgemini Brasil S.A. - 486145</option>'+
	                        '<option value="752656">Cast Informática S.A. - 752656</option>'+
	                        '<option value="820312">Confluence Soluções em informática Ltda. - 820312</option>'+
	                        '<option value="1649480">Consmaster Consultoria e Assessoria - 1649480</option>'+
	                        '<option value="1584886">DBR Consultoria e Tecnologia Ltda. - 1584886</option>'+
	                        '<option value="860281">Discover Technology Informatica - 860281</option>'+
	                        '<option value="948265">ETZ Informatica, Ltda. - 948265</option>'+
	                        '<option value="1169612">Easyone Consultoria Ltda. - 1169612</option>'+
	                        '<option value="1239170">Engineering do Brasil S/A - 1239170</option>'+
	                        '<option value="1426872">Epi-Use Brasil Serviços - 1426872</option>'+
	                        '<option value="1146842">Essence Consultoria - 1146842</option>'+
	                        '<option value="855982">FH Consultoria Empresarial Ltda. - 855982</option>'+
	                        '<option value="890844">FINITY SERVICOS DE CONSULTORIA EM - 890844</option>'+
	                        '<option value="1169371">First Decision Tecnologias- 1169371</option>'+
	                        '<option value="923756">Fluxus Consultoria em Software Ltda - 923756</option>'+
	                        '<option value="1229193">Formers Consulting Tecnologia LTDA - 1229193</option>'+
	                        '<option value="862540">G2 Informática Ltda - 862540</option>'+
	                        '<option value="1714279">HIRSCH CONSULTORIA E SERVIÇOS EIRELI - 1714279</option>'+
	                        '<option value="1700796">HSOURCE IT- 1700796</option>'+
	                        '<option value="1418431">Hcmx It Solucoes em Tecnologia - 1418431</option>'+
	                        '<option value="35202">IBM Brasil - Indústria, Máquinas - 35202</option>'+
	                        '<option value="519182">IBS Integrated Business Solutions - 519182</option>'+
	                        '<option value="766294">ITS Tecnologia e Informação Ltda - 766294</option>'+
	                        '<option value="754437">Indra Brasil Soluções e Serviços - 754437</option>'+
	                        '<option value="1178205">Infocom Art Comercio de Informática e - 1178205</option>'+
	                        '<option value="1306824">Intelligenza Soluções em - 1306824</option>'+
	                        '<option value="1216798">Intragroup Tecnologia da Informação - 1216798</option>'+
	                        '<option value="1635603">K2 Partnering Solutions Do Brasil - 1635603</option>'+
	                        '<option value="1511266">KPIT Technologies solucoes - 1511266</option>'+
	                        '<option value="1249827">Keyrus Brasil Serviços de Informática - 1249827</option>'+
	                        '<option value="1593371">LF Desenvolvimento de Programas Ltda. - 1593371</option>'+
	                        '<option value="1056203">LPJ Consultoria e Treinamento Ltda - 1056203</option>'+
	                        '<option value="819916">Lago Consultoria e Sistemas Ltda. - 819916</option>'+
	                        '<option value="848760">Letnis Consultoria de Informatica Ltda - 848760</option>'+
	                        '<option value="1253022">Liberali Serviços Empresariais Ltda - ME - 1253022</option>'+
	                        '<option value="1367535">Lume Serviços De Tecnologia Ltda - 1367535</option>'+
	                        '<option value="699483">META SERVICOS EM INFORMATICA S/A - 699483</option>'+
	                        '<option value="1063036">MIT & EBS Enterprise Business - 1063036</option>'+
	                        '<option value="832647">Megawork Consultoria e Sistemas Ltda - 832647</option>'+
	                        '<option value="1715527">Meta Serviços em Informática S/A - 1715527</option>'+
	                        '<option value="1055718">NMS Solucoes Integradas - 1055718</option>'+
	                        '<option value="1688400">Neocantra Tecnologia e Consultoria Ltda. - 1688400</option>'+
	                        '<option value="484358">Neoris do Brasil Ltda - 484358</option>'+
	                        '<option value="1104463">Okser Consultoria de Sistemas Ltda. - 1104463</option>'+
	                        '<option value="1328766">Okser Software e Servicos em Informatica - 1328766</option>'+
	                        '<option value="1767119">PEOPLEWARE INTEGRADORA EM TECNOLOGIA DA - 1767119</option>'+
	                        '<option value="858356">PGT Solucoes Comercio e Servicos - 858356</option>'+
	                        '<option value="1598903">RUN SISTEMAS DIGITAIS LTDA - ME - 1598903</option>'+
	                        '<option value="758845">Ramo Sistemas Digitais Ltda - 758845</option>'+
	                        '<option value="1252359">Resource Americana LTDA - 1252359</option>'+
	                        '<option value="1633302">Rhopen Consultoria Ltda. - EPP - 1633302</option>'+
	                        '<option value="1060671">SPRO CONSULTORIA E INFORMATICA LTDA. - 1060671</option>'+
	                        '<option value="1356658">SPS Gestao Empresarial LTDA - EPP - 1356658</option>'+
	                        '<option value="985864">SQL Intelligence Consultoria Ltda - 985864</option>'+
	                        '<option value="1669013">SSBS Consultoria LTDA - ME - 1669013</option>'+
	                        '<option value="1397902">STAR - Soluções Tec. Avançada Retail Lt - 1397902</option>'+
	                        '<option value="1147676">SUM Reseller S/A - 1147676</option>'+
	                        '<option value="840065">SUPERABIZ SOFTWARE LTDA - 840065</option>'+
	                        '<option value="1138761">Seidor Crystalis - Tecnologia - 1138761</option>'+
	                        '<option value="854556">Sistema Informatica Empresarial Ltda - 854556</option>'+
	                        '<option value="709829">Sonda Procwork Informática Ltda - 709829</option>'+
	                        '<option value="1335867">Sou Servicos de Informatica em Educacao - 1335867</option>'+
	                        '<option value="1740096">Southend Tecnologia da Informacao Ltda - 1740096</option>'+
	                        '<option value="1106782">Spektrum Comércio e Consultoria - 1106782</option>'+
	                        '<option value="271978">Stefanini Consultoria e Assessoria - 271978</option>'+
	                        '<option value="1297017">Stratesys Tecnologias Da Informaçao - 1297017</option>'+
	                        '<option value="1297774">Strong IT Consultoria e Solucoes em - 1297774</option>'+
	                        '<option value="344069">T-Systems do Brasil Ltda - 344069</option>'+
	                        '<option value="1503322">TDS Enterprise Consultoria - 1503322</option>'+
	                        '<option value="1335668">TECH MAHINDRA SERVICOS DE INFORMATICA - 1335668</option>'+
	                        '<option value="1696761">TGE CONSULTORIA DE INFORMÁTICA LTDA - 1696761</option>'+
	                        '<option value="1728476">TRADE ONE SISTEMA DE TECNOLOGIA LTDA-ME - 1728476</option>'+
	                        '<option value="1139442">Tivit Terceirizacao de Processos - 1139442</option>'+
	                        '<option value="1324573">UOL Diveo Tecnologia LTDA. - 1324573</option>'+
	                        '<option value="832678">Uppertools Tecnologia da Informação Ltda - 832678</option>'+
	                        '<option value="1193042">VAR3F  CONSULTORIA INFORMATICA E - 1193042</option>'+
	                        '<option value="1334161">Vert Soluções em Informática LTDA - 1334161</option>'+
	                        '<option value="1138015">Vetta Technologies Ltda - 1138015</option>'+
	                        '<option value="1702471">WMX Consultoria e Serviços em - 1702471</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
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
            combPatn = '<select class="selectpicker" id="partner" style="display: block !important">'+
	                        '<option value="1241412">"Go SCM+ Consulting" S.A. de C.V. - 1241412</option>'+
	                        '<option value="826672">AGASYS S.A. de C.V. - 826672</option>'+
	                        '<option value="692048">Altriatec, S.A. de C.V. - 692048</option>'+
	                        '<option value="1702486">Aplicaciones en la Nube, S.A. de C.V. - 1702486</option>'+
	                        '<option value="885690">BSD Enterprise Group S.A. de C.V. - 885690</option>'+
	                        '<option value="1661781">BTS Consulting Group, S.A. de C.V. - 1661781</option>'+
	                        '<option value="1175860">BXTI Soluciones en Tecnología - 1175860</option>'+
	                        '<option value="1032537">Bic Consultoria Integral de Negocios, - 1032537</option>'+
	                        '<option value="1507542">Big Data Solutions S.A. de C.V - 1507542</option>'+
	                        '<option value="1339890">Bits Desarrollo E Ingenieria It Sc - 1339890</option>'+
	                        '<option value="825466">Blue Solutions, S.A. de C.V. - 825466</option>'+
	                        '<option value="1198724">Business Process Solutions SA de CV - 1198724</option>'+ 
	                        '<option value="1427226">CVM GROUP & MANAGEMENT - 1427226</option>'+ 
	                        '<option value="752878">Caisa Consultores y Servicios, - 752878</option>'+
	                        '<option value="204724">Capgemini Mexico, S. de R.L. de C.V.- 204724</option>'+
	                        '<option value="1650311">Celeritech Mexico SAPI de CV - 1650311</option>'+
	                        '<option value="715105">Corponet Implements, S.A. de C.V. - 715105</option>'+
	                        '<option value="1253685">Corporacion Mexicana de Adopcion - 1253685</option>'+
	                        '<option value="1253025">DC Extended Delivery S. de R.L. de C.V. - 1253025</option>'+
	                        '<option value="762673">Desarrollo de Soluciones Integrales SBO - 762673</option>'+
	                        '<option value="862118">Dexterity, S.A. de C.V. - 862118</option>'+
	                        '<option value="1113124">Dintec Consulting SA de CV - 1113124</option>'+
	                        '<option value="672753">Distribuidora Mexicana de Productos, - 672753</option>'+
	                        '<option value="505660">Enable, S.C. - 505660</option>'+
	                        '<option value="898051">Enapsys México, S.A. de C.V. - 898051</option>'+
	                        '<option value="881088">Epi-use México, S.A. de C.V. - 881088</option>'+
	                        '<option value="1047982">Everis México, S. de R.L. de C.V. - 1047982</option>'+
	                        '<option value="673061">Financial Applications, S.A. de C.V. - 673061</option>'+
	                        '<option value="1662163">Gigante It, S.A. De C.V. - 1662163</option>'+
	                        '<option value="758259">Grupo ASSA México Soluciones - 758259</option>'+
	                        '<option value="1329258">Grupo Gigante S.A.B. de C.V. - 1329258</option>'+
	                        '<option value="1585825">I Grow Human Innovation Consulting - 1585825</option>'+
	                        '<option value="651157">IBM de México, Comercialización - 651157</option>'+
	                        '<option value="1300905">INTEGRADORES DE SOLUCIONES EMPRESARIALES - 1300905</option>'+
	                        '<option value="715859">IT Consultant, S.C. - 715859</option>'+
	                        '<option value="1423409">Inndot S.A. de C.V. - 1423409</option>'+
	                        '<option value="1503635">Integra HCM S.A. de C.V. - 1503635</option>'+
	                        '<option value="843163">Integra Soluciones Informáticas, - 843163</option>'+
	                        '<option value="670738">Intellego, S.C. - 670738</option>'+
	                        '<option value="805234">InterLatin, S. de R.L. de C.V. - 805234</option>'+
	                        '<option value="708379">Link Technologies, S. A. P. I. de C.V. - 708379</option>'+
	                        '<option value="614725">Neoris de México, S.A. de C.V. - 614725</option>'+
	                        '<option value="672869">North American Software, - 672869</option>'+
	                        '<option value="1708419">ORION 360, S.A. DE C.V - 1708419</option>'+
	                        '<option value="851178">OptiSoft, S.A. De C.V. - 851178</option>'+
	                        '<option value="1049826">Organización de Conocimiento - 1049826</option>'+
	                        '<option value="744082">Prosap, S.A. de C.V. - 744082</option>'+
	                        '<option value="744826">Redsinergia Consultoría Gerencial, - 744826</option>'+
	                        '<option value="704091">SEIDOR MEXICO SAPI de CV - 704091</option>'+
	                        '<option value="1192243">Sineti Consulting SC - 1192243</option>'+
	                        '<option value="926787">Softtek Servicios y Tecnologia S.A de CV - 926787</option>'+
	                        '<option value="823624">Softtek Tecnología en Información, - 823624</option>'+
	                        '<option value="1468091">Stratesys Technology Solutions, SA CV - 1468091</option>'+
	                        '<option value="833774">Syaat México, S.A. de C.V. - 833774</option>'+
	                        '<option value="13175">T-Systems México, S.A. de C.V. - 13175</option>'+
	                        '<option value="1364309">TSI ARYL, S. DE R.L. DE C.V. - 1364309</option>'+
	                        '<option value="1667570">Techedge System Consulting Mexico, S.A. - 1667570</option>'+
	                        '<option value="1667773">Telinet, S.A. de C.V. - 1667773</option>'+
	                        '<option value="651160">Tesselar Soluciones, S.A. de C.V. - 651160</option>'+
	                        '<option value="1695221">Vivo GS Mexico SA de CV - 1695221</option>'+
	                        '<option value="1083071">Wise Technology Services de México, - 1083071</option>'+
	                    '</select>';
            componentHandler.upgradeAllRegistered();
            $("#divPais").html('');
            $("#divPais").append(combo);
            $("#divPartner").html('');
            $("#divPartner").append(combPatn);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }
}
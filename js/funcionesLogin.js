function validarLogin()
{
	$("#mensajesLogin").val('');
	var varUsuario=$("#correo").val();
	var varClave=$("#clave").val();
	var recordar=$("#recordarme").is(':checked');
		
//$("#mensajesLogin").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave
		}
	});

	funcionAjax.done(function(retorno) {
		if (retorno == "No-esta" || retorno == "errorClave") {
			$("#mensajesLogin").html("Usuario o clave incorrectos.");
			$("#botonesNav").html('');
		} else {
			MostrarBotones();
			MostrarLogin();
		}
	});
	funcionAjax.fail(function(retorno) {
		$("#botonesNav").html('');
		$("#mensajesLogin").html(retorno.responseText);	
	});
	
}

// Usa datos de usuario hardcodeados, para facilitar las pruebas
function testLogin(tipoUsuario) {
	if (tipoUsuario=='usuario' || tipoUsuario=='admin') {
		if (tipoUsuario=='usuario') {
			$("#correo").val('usuariotest@gmail.com');
			$("#clave").val('testUser01');
		} else if (tipoUsuario=='admin') {
			$("#correo").val('usuarioadmin@gmail.com');
			$("#clave").val('adminUser92');
		}
		validarLogin();
	}
}

function deslogear() {
	var funcionAjax = $.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"
	});
	funcionAjax.done(function(retorno) {
		$("#botonesNav").html('');
		Mostrar('MostrarInicio');
	});
}

function MostrarBotones() {
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarBotones"}
	});
	funcionAjax.done(function(retorno) {
		$("#botonesNav").html(retorno);
	});
}

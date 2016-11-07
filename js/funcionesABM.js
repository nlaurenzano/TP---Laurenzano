function BorrarCD(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function EditarCD(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var cd =JSON.parse(retorno);	
		$("#idCD").val(cd.id);
		$("#cantante").val(cd.cantante);
		$("#titulo").val(cd.titulo);
		$("#anio").val(cd.año);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
	Mostrar("MostrarFormAlta");
}

function GuardarVehiculo()
{
		var patente=$("#patente").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarVehiculo",
			patente:patente	
		}
	});
	funcionAjax.done(function(retorno){
		//Mostrar("MostrarGrilla");
		//$("#informe").html("Vehículo ingresado exitosamente.");	
		$("#informe").html(retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html("Error al ingresar el vehículo: " + retorno.responseText);	
	});	
}
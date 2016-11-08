
function Mostrar(queMostrar)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostrarLogin() {
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarLogin"}
	});
	funcionAjax.done(function(retorno) {
		$("#formLogin").html(retorno);
	});
	funcionAjax.fail(function(retorno) {
		$("#mensajesLogin").html("Error en login.");
	});
	funcionAjax.always(function(retorno) {
		//alert("siempre "+retorno.statusText);
	});
}
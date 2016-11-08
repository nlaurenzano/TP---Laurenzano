<?php
	require_once('clases/Vehiculo.php');
	require_once('clases/Estacionamiento.php');
	require_once('clases/AccesoDatos.php');
?>

<script type="text/javascript">
	function Sacar(patente)
	{
		$('#idparasacar').val(patente);
		document.frmSalir.submit();
	}
	function Borrar(patente)
	{
		$('#idparaborrar').val(patente);
		document.frmBorrar.submit();
	}
	function Modificar(patente)
	{
		//alert(patente);
		$('#idparamodificar').val(patente);
		document.frmModificar.submit();
	}
</script>

<?php
	if(isset($_POST['idparasacar']))
	{
		$resultado = Estacionamiento::Sacar($_POST['idparasacar']);
	}
	if(isset($_POST['idparaborrar']))
	{
		$resultado = Vehiculo::Borrar($_POST['idparaborrar']);
	}
?>	
<div class="">
	<h3>LISTADOS</h3>

<?php 

	//Estacionamiento::ImprimirTablas();
	ImprimirTablas();
	
?>
</div>

<form name="frmSalir" method="POST" >
	<input type="hidden" name="idparasacar" id="idparasacar" />
</form>

<form name="frmBorrar" method="POST" >
	<input type="hidden" name="idparaborrar" id="idparaborrar" />
</form>

<form name="frmModificar" method="POST" action="alta.php">
	<input type="hidden" name="idparamodificar" id="idparamodificar" />
</form>
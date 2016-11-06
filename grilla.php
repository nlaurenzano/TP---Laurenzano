<?php
	require_once('clases/Vehiculo.php');
	require_once('clases/Estacionamiento.php');
	require_once('clases/AccesoDatos.php');
?>
<html>
<head>
	<title>Estacionamiento TP</title>
	  
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="estilo.css">-->

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
</head>
<body>
	<div class="container">
		<a class="btn btn-info" href="index.html">Menu principal</a>
		<a class="btn btn-info" href="alta.php">Ingreso y salida</a>
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
		<form name="frmSalir" method="POST" >
			<input type="hidden" name="idparasacar" id="idparasacar" />
		</form>
		
		<form name="frmBorrar" method="POST" >
			<input type="hidden" name="idparaborrar" id="idparaborrar" />
		</form>
		
		<form name="frmModificar" method="POST" action="alta.php">
			<input type="hidden" name="idparamodificar" id="idparamodificar" />
		</form>

		<div class="">
			<h1>Estacionamiento TP</h1>      
		</div>
		<div class="">
			<h1>Listados</h1>

<?php 

	Estacionamiento::ImprimirTablas();
	
?>
		</div>
	</div>
</body>
</html>
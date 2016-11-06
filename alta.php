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
</head>
<body>
<div class="container">
	<a class="btn btn-info" href="index.html">Menu principal</a>
	<a class="btn btn-info" href="grilla.php">Listados</a>
<?php     
	require_once("clases\Vehiculo.php");
	require_once("clases\Estacionamiento.php");
	require_once("clases\AccesoDatos.php");

	if(isset($_POST['idparamodificar'])) {
		//viene de la grilla
		$unVehiculo = Vehiculo::TraerPorPatente($_POST['idparamodificar']);
	}
?>
	<div class="">
		<div class="">
			<h1>Estacionamiento TP</h1>
		</div>
		<div class="">
			<h1>Datos del vehículo</h1>

			<form id="FormIngreso" method="post">
				<input type="text" name="patente" placeholder="Patente" value="<?php echo isset($unVehiculo) ?  $unVehiculo->GetPatente() : "" ; ?>" />
				
				<input type="hidden" name="entradaModif" placeholder="Horario de entrada" value="<?php echo isset($unVehiculo) ?  $unVehiculo->GetEntrada() : "" ; ?>" />
				<input type="hidden" name="patenteModif" value="<?php echo isset($unVehiculo) ? $unVehiculo->GetPatente() : "" ; ?>" />

				<input type="submit" class="btn btn-success" name="guardar" value="Ingresar" />
				<input type="submit" class="btn btn-success" name="salir" value="Salir" />

			</form>
		</div>

<?php

	if (isset($_POST['guardar'])) {
		// si esto no se cumple ingreso por primera vez
		if ($_POST['patenteModif'] != "") {
			$unVehiculo = Vehiculo::TraerPorPatente($_POST['patente']);
			$unVehiculo->SetPatente($_POST['patente']);
			$unVehiculo->SetEntrada($_POST['entrada']);
			
			$retorno = $unVehiculo->ModificarEstacionado();
		} else {
			// si es un alta
			if (Estacionamiento::Guardar($_POST['patente'])) {
				// Mensaje 'Ingresado exitosamente'
			}
		}
	}
	elseif (isset($_POST['salir'])) {
		// si es un salida
		if (Estacionamiento::Sacar(($_POST['patente']))) {
			// Mensaje 'Sacado exitosamente'
		}

	}
?>
	</div>
</div>
</body>
</html>
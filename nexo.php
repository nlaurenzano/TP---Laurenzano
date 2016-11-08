<?php 
require_once('./SERVIDOR/lib/nusoap.php');
require_once("clases/AccesoDatos.php");
require_once("clases/Estacionamiento.php");
require_once("clases/Vehiculo.php");

$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'MostrarInicio':
		include("partes/inicio.php");
		break;
	case 'MostrarBotones':
		include("partes/botonesNav.php");
		break;
	case 'MostrarAlta':
		include("partes/alta.php");
		break;
	case 'MostrarGrilla':
		include("partes/grilla.php");
		//ImprimirTablas();
		break;
	case 'MostrarAdmin':
		include("partes/admin.php");
		break;
	case 'MostrarLogin':
		include("partes/login.php");
		break;
	case 'GuardarVehiculo':
		Estacionamiento::Guardar($_POST['patente']);
		break;
	case 'SacarVehiculo':
		Estacionamiento::Sacar($_POST['patente']);
		break;
	case 'BorrarVehiculo':
		Vehiculo::Borrar($_POST['patente']);
		break;
	/*
	case 'TraerVehiculo':
		$veh = Vehiculo::TraerPorPatente($_POST['id']);		
		echo json_encode($veh);
		break;
	*/

	default:
		# code...
		break;
}

function TraerEstacionadosWS($host) {
	//$host = 'http://localhost/TP-Laurenzano/SERVIDOR/ws.php';
	$client = new nusoap_client($host . '?wsdl');

	$err = $client->getError();
	if ($err) {
		echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
		die();
	}

	$vehiculos = $client->call('TraerTodosLosEstacionados');

	if ($client->fault) {
		echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
		print_r($vehiculos);
		echo '</pre>';
	} else {
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
		} 
		else {
			return $vehiculos;
		}
	}
}

function TraerCobradosWS($host) {
	//$host = 'http://localhost/TP-Laurenzano/SERVIDOR/ws.php';
	$client = new nusoap_client($host . '?wsdl');

	$err = $client->getError();
	if ($err) {
		echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
		die();
	}

	//INVOCO AL METODO DE MI WS		
	$vehiculos = $client->call('TraerTodosLosCobrados');

	if ($client->fault) {
		echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
		print_r($vehiculos);
		echo '</pre>';
	} else {
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
		} 
		else {
			return $vehiculos;
		}
	}
}

function ImprimirTablas() {
	$host = 'http://localhost:80/TP-Laurenzano/SERVIDOR/ws.php';
	//$host = 'http://www.tplaurenzano.esy.es/SERVIDOR/ws.php';
	$estacionados = TraerEstacionadosWS($host);
	$cobrados = TraerCobradosWS($host);

	echo '<div style="padding:10px;">';
	
	echo '<div style="float:left;">';		// Tabla de estacionados
	echo "<h3>Estacionados</h3>";
	echo "<table>
			<tr>
				<th>Patente</th>
				<th>Entrada</th>
			</tr>";

	foreach ($estacionados as $veh) {
		echo  "<tr>
					<td>".$veh['patente']."</td>
					<td>".$veh['entrada']."</td>";

		/*
		echo "		<td>
						<button class=\"btn btn-success hidden\" name=\"Salir\" 
							onclick=\"Sacar('".$veh->GetPatente()."')\">Salir</button>
						<button class=\"btn btn-danger hidden\" name=\"Borrar\" 
							onclick=\"Borrar('".$veh->GetPatente()."')\">Borrar</button>
						<button class=\"btn btn-danger hidden\" name=\"Modificar\" 
							onclick=\"Modificar('".$veh->GetPatente()."')\">Modificar</button>
					</td>";
					*/
		echo "			</tr>";
	}

	echo '</table></div>';						// Tabla de estacionados

	// Tabla de tickets
	echo '<div style="float:right;">
			<h3>Cobrados</h3>
			<table>
				<tr>
					<th>Patente</th>
					<th>Entrada</th>
					<th>Salida</th>
					<th>Importe</th>
				</tr>';
	
	foreach ($cobrados as $ticket) {
		echo  "<tr>
					<td>".$ticket['patente']."</td>
					<td>".$ticket['entrada']."</td>
					<td>".$ticket['salida']."</td>
					<td class=\"moneda\">$ ".$ticket['importe']."</td>";
		/*
		echo "		<td>
						<button class=\"btn btn-danger hidden\" name=\"Borrar\" 
							onclick=\"Borrar('".$ticket->GetPatente()."')\">Borrar</button>
						<button class=\"btn btn-danger hidden\" name=\"Modificar\" 
							onclick=\"Modificar('".$ticket->GetPatente()."')\">Modificar</button>
					</td>";
		*/
					echo "	</tr>";
	}
	
	echo '</table></div></div>';
}

?>
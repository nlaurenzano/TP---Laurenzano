<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/Estacionamiento.php");
require_once("clases/Vehiculo.php");

$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'MostrarInicio':
		include("partes/inicio.php");
		break;
	case 'MostrarAlta':
		include("partes/alta.php");
		break;
	case 'MostrarGrilla':
		include("partes/grilla.php");
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
	case 'TraerVehiculo':
		$veh = Vehiculo::TraerPorPatente($_POST['id']);		
		echo json_encode($veh);
		break;

	default:
		# code...
		break;
}

 ?>
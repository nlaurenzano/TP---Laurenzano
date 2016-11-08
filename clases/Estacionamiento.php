<?php

class Estacionamiento
{
	
	function __construct()
	{
		# code...
	}

	public static function Guardar($patente) {
		$patente = str_ireplace(" ", "", $patente);

		if (Estacionamiento::ValidarPatente($patente)) {
			if (Vehiculo::TraerPorPatente($patente)) {
				echo "La patente '$patente' pertenece a un vehículo que ya está registrado en el estacionamiento.";
				return false;
			} else {
				//$patente = strtoupper(chunk_split($patente, 3, " "));

				$unVehiculo = new Vehiculo();
				$unVehiculo->SetPatente($patente);
				$unVehiculo->SetEntrada(date("Y-m-d H:i:s"));
				$unVehiculo->InsertarEstacionado();
			}
		} else {
			echo "La patente '$patente' no es válida. El formato aceptado es 'ABC 123'";
			return false;
		}
		return true;
	}

	public static function Sacar($patente) {
		
		$patente = str_ireplace(" ","",$patente);
		$veh = Vehiculo::TraerPorPatente($patente);

		if ($veh) {
			// Tenemos el auto estacionado
			$importe = Estacionamiento::CalcularPrecio($veh);
			echo strval($importe);
			// Guardar en tabla de Tickets
			$veh->InsertarCobrado();

			Vehiculo::Borrar($veh->GetPatente());
		} else {
			echo "La patente '$patente' no pertenece a ningún vehículo registrado en el estacionamiento.";
		}
	}

	// $inicio = Fecha y hora de ingreso
	public static function CalcularPrecio($veh) {
		$inicio = $veh->GetEntrada();
		$ahora = date("Y-m-d H:i:s");		// Fecha y hora actuales
		$veh->SetSalida($ahora);

		$diferencia = strtotime($ahora) - strtotime($inicio);
		$importe = $diferencia * 0.009;	// Multiplico por el precio por segundo
		$veh->SetImporte($importe);

		return 'Importe = $'.$importe;
	}

	public static function ValidarPatente($patente) {
		// Validar que el formato de la patente ingresada sea 'ABC123'
		$patente = strtoupper(str_ireplace(" ","",$patente));
		
		if ($patente == "")
			return false;

		$partes = str_split($patente,3);
		
		if (strlen($partes[0]) != 3)
			return false;

		foreach (str_split($partes[0]) as $letra) {
			if (ord($letra) < 65 or ord($letra) > 90 ) {
				return false;
			}
		}
				
		if (isset($partes[1])) {
			if (strlen($partes[1]) != 3)
				return false;

			foreach (str_split($partes[1]) as $numero) {
				if (ord($numero) < 48 or ord($numero) > 57 ) {
					return false;
				}
			}
		}
		return true;
	}
}
?>
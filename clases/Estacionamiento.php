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

	public static function Leer() {
		$autos = array();
		$miarchivo = fopen("estacionados.txt", "r");	//http://www.w3schools.com/php/func_filesystem_fopen.asp

		while (!(feof($miarchivo))) {
			$renglon = rtrim(fgets($miarchivo));
			$renglonArray = explode(" - ", $renglon);

			if ($renglonArray[0] != "") {
				$autos[] = $renglonArray;
			}
			//echo '<br />'.$renglonArray[0];
		}
		fclose($miarchivo);
		return $autos;

	}

	public static function LeerTickets() {
		$tickets = array();
		$miarchivo = fopen("tickets.txt", "r");	//http://www.w3schools.com/php/func_filesystem_fopen.asp

		while (!(feof($miarchivo))) {
			$renglon = rtrim(fgets($miarchivo));
			$renglonArray = explode(" - ", $renglon);

			if ($renglonArray[0] != "") {
				$tickets[] = $renglonArray;
			}
		}
		fclose($miarchivo);
		return $tickets;

	}

	public static function Sacar($patente) {
		$estacionados = Estacionamiento::Leer();
		$hallado = false;
		$patente = str_ireplace(" ","",$patente);

		foreach ($estacionados as $key => $auto) {
			
			if (strcasecmp(str_ireplace(" ","",$auto[0]), $patente) == 0) {	// Comparación case insensitive
				// Tenemos el auto estacionado
				$hallado = true;

				Estacionamiento::CalcularPrecio($auto);
				Estacionamiento::Eliminar($estacionados, $key);

				break;
			}
		}

		if (!$hallado) {
			echo "La patente '$patente' no pertenece a ningún vehículo registrado en el estacionamiento.";
		}
	}

	// $inicio = Fecha y hora de ingreso
	public static function CalcularPrecio($auto) {
		$inicio = $auto[1];
		$ahora = date("Y-m-d H:i:s");		// Fecha y hora actuales

		$diferencia = strtotime($ahora) - strtotime($inicio);
		$importe = $diferencia * 10;	// Se guarda en ticket.txt

		$miarchivo = fopen("tickets.txt", "a");
		$renglon = "$auto[0] - $inicio - $ahora - $importe\n";
		fwrite($miarchivo, $renglon);	//Crea el archivo y guarda la patente
		fclose($miarchivo);

		echo 'Costo = $'.$importe;

	}

	public static function Eliminar($estacionados,$key) {
		// Elimina el elemento del array de autos estacionados
		unset($estacionados[$key]);

		// Reescribe el archivo de autos estacionados, sin el elemento que se acaba de eliminar
		$miarchivo = fopen("estacionados.txt", "w");	//http://www.w3schools.com/php/func_filesystem_fopen.asp

		foreach ($estacionados as $auto) {
			//$renglon = "$patente - $fecha"."\n";
			$renglon = "$auto[0] - $auto[1]"."\n";
			
			fwrite($miarchivo, $renglon);	//Crea el archivo y guarda la patente
		}
		fclose($miarchivo);
	}

	public static function BuscarEstacionado($patente) {
		$estacionados = Estacionamiento::Leer();
		$hallado = false;
		$patente = str_ireplace(" ","",$patente);

		foreach ($estacionados as $key => $auto) {
			
			if (strcasecmp(str_ireplace(" ","",$auto[0]), $patente) == 0) {	// Comparación case insensitive
				// Tenemos el auto estacionado
				$hallado = true;
			}
		}
		return $hallado;
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

	public static function ImprimirTablas() {

		$estacionados = Vehiculo::TraerTodosLosEstacionados();
		//$cobrados = Estacionamiento::LeerTickets(10);

		echo '<div style="padding:10px;">';
		
		echo '<div style="float:left;margin-right: 30px;">';		// Tabla de estacionados
		echo "<h2>Vehículos estacionados:</h2>";
		echo "<table>
				<tr>
					<th>Patente</th>
					<th>Entrada</th>
				</tr>";

		foreach ($estacionados as $veh) {
			echo  "<tr>
						<td>".$veh->GetPatente()."</td>
						<td>".$veh->GetEntrada()."</td>
						<td>
							<button class=\"btn btn-danger\" name=\"Borrar\" 
								onclick=\"Borrar('".$veh->GetPatente()."')\">Borrar</button>
						</td>
						<td>
							<button class=\"btn btn-warning\" name=\"Modificar\" 
								onclick=\"Modificar('".$veh->GetPatente()."')\">Modificar</button>
						</td>
					</tr>";
		}

		echo '</table></div>';						// Tabla de estacionados

		// Tabla de tickets
		echo "<div>
				<h2>Vehículos ya cobrados:</h2>
				<table>
					<tr>
						<th>Patente</th>
						<th>Entrada</th>
						<th>Salida</th>
						<th>Costo</th>
					</tr>";
		/*
		foreach ($cobrados as $ticket) {
			$fila = MiHTML::Celda($ticket[0] . "<br />$ " . $ticket[3]) . MiHTML::Celda($ticket[1] . "<br />" . $ticket[2]);
			echo MiHTML::Fila($fila);
		}
		*/
		echo '</table></div></div>';


	}

}


?>
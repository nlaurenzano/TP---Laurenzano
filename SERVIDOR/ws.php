<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../clases/AccesoDatos.php');
	require_once('../clases/Estacionamiento.php');
	require_once('../clases/Vehiculo.php');
	
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Estacionamiento', 'urn:wsEst'); 

///**********************************************************************************************************///								
	$server->register('TraerTodosLosEstacionados',
						array(),
						array('return' => 'xsd:Array'),
						'urn:wsEst',
						'urn:wsEst#TraerTodosLosEstacionados',
						'rpc',
						'encoded',
						'Obtiene todos los vehiculos estacionados.'
					);


	function TraerTodosLosEstacionados() {
		return Vehiculo::TraerTodosLosEstacionados();
	}

	$server->register('TraerTodosLosCobrados',
						array(),
						array('return' => 'xsd:Array'),
						'urn:wsEst',
						'urn:wsEst#TraerTodosLosCobrados',
						'rpc',
						'encoded',
						'Obtiene todos los vehiculos que ya salieron del estacionamiento.'
					);


	function TraerTodosLosCobrados() {
		return Vehiculo::TraerTodosLosCobrados();
	}
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);

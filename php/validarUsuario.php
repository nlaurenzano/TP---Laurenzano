<?php 
require_once("../clases/AccesoDatos.php");
require_once("../clases/Usuario.php");

session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$recordar = $_POST['recordarme'];

$userBuscado = Usuario::TraerPorEmail($usuario);

if ($userBuscado) {
	if ($userBuscado->GetClave()==$clave) {
		if($recordar=="true")
		{
			setcookie("registro",$usuario,  time()+36000 , '/');
		} else {
			setcookie("registro",$usuario,  time()-36000 , '/');
		}
		$_SESSION['registrado']=$userBuscado->GetNombre();
		$_SESSION['rol']=$userBuscado->GetRol();
		$retorno="ingreso";
	} else {
		$retorno= "errorClave";
	}
} else {
	$retorno= "No-esta";
}

echo $retorno;
?>
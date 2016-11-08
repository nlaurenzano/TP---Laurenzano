<?php 
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;

if (($usuario=="usuariotest@gmail.com" && $clave=="testUser01") || ($usuario=="usuarioadmin@gmail.com" && $clave=="adminUser92")) {
	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
	} else {
		setcookie("registro",$usuario,  time()-36000 , '/');
	}
	$_SESSION['registrado']="Usuario Test";
	$retorno="ingreso";

} else {
	$retorno= "No-esta";
}

echo $retorno;
?>
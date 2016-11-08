<?php 
session_start();
if(isset($_SESSION['registrado'])) {
?>

<ul class="nav navbar-nav navbar-right">
	<li><a onclick="Mostrar('MostrarInicio');">INICIO</a></li>
	<li><a onclick="Mostrar('MostrarAlta')">INGRESO / SALIDA</a></li>
	<li><a onclick="Mostrar('MostrarGrilla')">LISTADOS</a></li>
	
<?php 
if($_SESSION['rol']=='admin') {
?>
	<li><a onclick="Mostrar('MostrarAdmin')">ADMINISTRACIÓN</a></li>
<?php 
}
?>	

	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" >
			<?php echo $_SESSION['registrado']?>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li><a onclick="deslogear()">Desconectar</a></li> 
		</ul>
	</li>
</ul>

<?php 
}
?>
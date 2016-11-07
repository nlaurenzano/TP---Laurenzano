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
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <script type="text/javascript" src="js/funcionesAjax.js"></script>
		<script type="text/javascript" src="js/funcionesLogin.js"></script>
		<script type="text/javascript" src="js/funcionesABM.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" onclick="Mostrar('MostrarInicio');">TP</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a onclick="Mostrar('MostrarInicio');">INICIO</a></li>
	        <li><a onclick="Mostrar('MostrarAlta')">INGRESO / SALIDA</a></li>
	        <li><a onclick="Mostrar('MostrarGrilla')">LISTADOS</a></li>
	        <li><a onclick="Mostrar('MostrarAdmin')">ADMINISTRACIÓN</a></li>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" >
	          	<script type="text/javascript">Mostrar('Username');</script>
	          	<span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu">
	            <li><a onclick="Logout()">Desconectar</a></li> 
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container text-center" id="principal">
	    <script type="text/javascript">Mostrar('MostrarInicio');</script>
	</div>
	    
</body>
</html>
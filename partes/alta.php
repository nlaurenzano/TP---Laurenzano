<?php     
	require_once("clases/Vehiculo.php");
	require_once("clases/Estacionamiento.php");
	require_once("clases/AccesoDatos.php");

	if(isset($_POST['idparamodificar'])) {
		$unVehiculo = Vehiculo::TraerPorPatente($_POST['idparamodificar']);
	}
?>
<div class="">
	<h3>DATOS DEL VEHÍCULO</h3>
		
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
			</div>
		
			<div class="col-md-6">
				<input type="text" name="patente" id="patente" placeholder="Patente" 
					class="form-control input-lg" value="<?php echo isset($unVehiculo) ?  $unVehiculo->GetPatente() : "" ; ?>" />
				
				<input type="hidden" name="entradaModif" placeholder="Horario de entrada" 
					class="form-control" value="<?php echo isset($unVehiculo) ?  $unVehiculo->GetEntrada() : "" ; ?>" />
				<input type="hidden" name="patenteModif" 
					class="form-control" value="<?php echo isset($unVehiculo) ? $unVehiculo->GetPatente() : "" ; ?>" />
			</div>

			<div class="col-md-3">
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
			</div>
		
			<div class="col-md-3">
				<input type="button" class="btn btn-lg btn-block btn-success" name="guardar" value="Ingresar"
					onclick="GuardarVehiculo()" />
			</div>

			<div class="col-md-3">
				<input type="button" class="btn btn-lg btn-block btn-success" name="salir" value="Salir" 
					onclick="SacarVehiculo()" />
			</div>

			<div class="col-md-3">
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
			</div>
		
			<div class="col-md-6">
				<div class="" id="mensajesABM">

				</div>
			</div>

			<div class="col-md-3">
			</div>
		</div>
	</div>
</div>
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>

    <div class="row">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-6">
        <h3>Ingrese sus datos</h3>

        <input type="email" id="correo" placeholder="Correo electrónico" 
          class="form-control input-lg" required="" autofocus="" 
          value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>" />
        
        <input type="password" id="clave" placeholder="Contraseña" minlength="4"
          class="form-control input-lg" required="" />
        
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordar mis datos
          </label>
        </div>
      </div>

      <div class="col-md-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-6">
        <input type="button" class="btn btn-lg btn-block btn-success" name="ingresar" value="Ingresar"
          onclick="validarLogin();return false;" />
      </div>

      <div class="col-md-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-3">
        <input type="button" class="btn btn-lg btn-block btn-success" value="Usuario Test"
          onclick="testLogin('usuario');return false;" />
      </div>

      <div class="col-md-3">
        <input type="button" class="btn btn-lg btn-block btn-success" value="Admin Test"
          onclick="testLogin('admin');return false;" />
      </div>

      <div class="col-md-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-6">
        <div class="" id="mensajesLogin">
        </div>
      </div>

      <div class="col-md-3">
      </div>
    </div>
        



  <?php
} else {
  echo"<h3>Bienvenido ".$_SESSION['registrado'].".</h3>";?>

  <button onclick="deslogear()" class="btn btn-lg btn-block btn-success" type="button">
    <span class="glyphicon glyphicon-off">&nbsp;</span>Desconectar
  </button>

 <script type="text/javascript">
  MostrarBotones();
  </script>

<?php  }  ?>
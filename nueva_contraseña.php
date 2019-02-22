<?php
Ob_start(); 
Session_start();  
?>
<!doctype html>
<html class="no-js" lang="">
<?php
  require_once("enlaces/enlaces.html");
?>

<body>
<div class="container principal">
  <div class="col-lg-4 col-lg-offset-4">
    <div class="row">
      <div class="col-lg-12">
        <img  src="img/milogo.png" width="200px;">
        <h1 class="titulos"><span style="font-family: Bernard MT Condensed">Cambio de contraseña</span></h1>        
      </div>
    </div>

    <div class="row">
      <form action="guardar_nueva_contraseña.php" class="form" method="post"> 
       <h4>Ingrese su usario y actual contraseña</h4>
       <div class="form-group has-feedback">
         <input type="text" name="usuario" placeholder="Usuario" class="form-control" required="">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>  
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="actcontra" placeholder="Actual Contraseña" class="form-control" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>     
        </div>

        <h4>Nueva Contraseña</h4>

        <div class="form-group has-feedback">
          <input type="password" name="contra1" placeholder="Nueva Contraseña" class="form-control" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>   
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="contra2" placeholder="Confirmar Contraseña" class="form-control" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>  
        </div>

     </div>

      <div class="row">
        <div class="form-group">
          <button class="form-control btn btn-default">Cambiar Contraseña</button>
        </div>
      </div>
    </form>
</div>
</div>
</div> 
</body>
</html>
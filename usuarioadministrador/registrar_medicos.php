<?php
 Ob_start(); 
?>
<?php
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
   <img  src="../img/milogo.png" width="200px;">
   <div class="col-lg-5">
    <h1 class="titulos"><span style="font-family: Bernard MT Condensed">Registrar Medicos</span></h1>
   </div>
  </div>

  <div class="row">
    <form action="guardar_medico.php" class="form" method="post"> 

    <div class="form-group has-feedback">
      <input type="text" name="nombre" placeholder="Nombre del Medico" class="form-control" required="">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="especialidad" placeholder="Especialidad" class="form-control" required="">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="telefono" placeholder="Telefono" class="form-control" required="">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>   
    </div>

  <div class="form-group has-feedback ">
    <div class="form-group">
    <button class="form-control btn btn-default">Registrar</button>
    <a href="">Eliminar medico</a>
    </div>
  </div>
  </form>
  </div>
</div>
</div>
</body>
</html>
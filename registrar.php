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
   <img  src="img/milogo.png" width="200px;">
   <div class="col-lg-5">
    <h1 class="titulos"><span style="font-family: Bernard MT Condensed">registrar</span></h1>
   </div>
  </div>

  <div class="row">
    <form action="guardados/guardarregistro.php" class="form" method="post" enctype="multipart/form-data"> 

    <h4>Usuario</h4>

    <div class="form-group has-feedback">
      <input type="text" name="usuario" placeholder="USUARIO" class="form-control" required="">
      <span class=" glyphicon glyphicon-home form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="password" name="contra" placeholder="PASSWORD" class="form-control" required="">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>  
    </div>

    <div class="form-group has-feedback">
      <h4>Foto de perfil</h4>
      <input class="form-control" name="imagenes[]" type="file" />
    </div>

    <h4>Datos Personales</h4>

    <div class="form-group has-feedback">
      <input type="text" name="id" placeholder="DOC IDENTIDAD" class="form-control" required="">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="nombres" placeholder="Nombres"  style="text-transform:uppercase;" class="form-control mayusculas" required="">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="apellidos" placeholder="Apellidos" style="text-transform:uppercase;" class="form-control" required="">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="direccion" placeholder="Direccion" style="text-transform:uppercase;" class="form-control" required="">
      <span class="glyphicon glyphicon-screenshot form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="telefono" placeholder="TELEFONO" class="form-control" required="">
      <span class="glyphicon glyphicon-phone form-control-feedback"></span>   
    </div>

    <div class="form-group has-feedback">
      <input type="text" name="email" placeholder="EMAIL" class="form-control" required="">
      <span class="glyphicon glyphicon-paperclip form-control-feedback"></span>    
    </div>
  </div>

  <div class="row">
    <div class="form-group">
    <button class="form-control btn btn-default">Registrese</button>
     </div>
  </div>
  </form>

  </div>
</div>
</div>
</body>
</html>
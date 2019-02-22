
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
<?php
 if (!isset($_POST["usuario"]) and !isset($_POST["contra"]))
{
?>
<div class="container principal">
<div class="col-lg-4 col-lg-offset-4">
  <img  src="img/milogo.png" width="200px;">
  <div class="row">
  <div class="col-lg-5">
    <h1 class="titulos"><span style="font-family: Bernard MT Condensed">IniciarSesion ADMINISTRATIVO</span></h1>      
  </div>         
  </div>
  <div class="row">
    <form action="loginadmi.php" class="form" method="post"> 
      <div class="form-group has-feedback">
       <input type="text" name="usuario" placeholder="Usuario" class="form-control" required="">
       <span class="glyphicon glyphicon-home form-control-feedback"></span>   
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="contra" placeholder="Password" class="form-control" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>             
      </div>
      <div class="form-group">
        <input type="submit" value="Acceder" class="form-control btn btn-primary">     
      </div>
    </form>
  </div>
  <div class="row">
    <form action="registrar.php">           
      <div class="form-group">
        <a href="nueva_contraseña.php">Cambiar contraseña</a>
      </div>
    </form> 
  </div>
</div>
</div>
<?php
}
else{
$usu=$_POST['usuario'];
$contra=$_POST['contra'];
$conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
$consulta=mysqli_query($conexion,"select *from usuarios_administrativos where usuid='$usu' and usupassword='$contra'");
if (mysqli_num_rows($consulta)<1){
  echo "<script>";
  echo "alert('USUARIO O PASSWORD INCORRECTO');";  
  echo "window.location = 'loginadmi.php';";
  echo "</script>";
  }
  else{
  $_SESSION['nombre']="$usu";
  header("location:usuarioadministrador/usuarioadmin.php");
  }
}
?>
<a href="login.php"><img src="img/admi.png"  ></a>
</body>
</html>

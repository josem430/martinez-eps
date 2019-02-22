<?php
Ob_start(); 
Session_start();  
if (isset($_SESSION['nombre'])){
?>
<!doctype html>
<html class="no-js" lang=""> 
<?php
  require_once("enlaces/enlaces.html");
?>

<body>
<div class="container-fluid">
<!--MENU PRINCIPAL-->
  <div class="row">
    <div class="col-lg-12" >
      <nav class="navbar navbar-inverse navbar-fixed-top menu" >
        <div class="container-fluid" >
          <div class="navbar-header" >
            <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                  
            </button>
            <a href="" class="navbar-brand"><img  src="img/milogo.png"></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background: #2980B9;">
            <ul class="nav navbar-nav navbar-right">
              <?php
             $nombre= $_SESSION["nombre"];
             $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");   
             if ($resultado = mysqli_query($conexion, "select  usunombre, usuapellido,usudireccion,usutelefono, email from usuarios where usuario='$nombre'")) {
              while ($fila = mysqli_fetch_row($resultado)) {
              echo "<li><a href='admin.php' >".$fila[0].$fila[1]."</a></li>";
               }
               mysqli_free_result($resultado);
              }    
              ?>
              <li><a href="mensajes.php" > Mensajes</a></li>
              <li><a href="cerrar.php">Cerrar Seccion</a></li>
              <li><a href="#"><div id="perfil"></div></a></li>           
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
<br>

<!--SECTION-->
<div class="col-lg-12">

   <div class="col-lg-4">                
      <ul class=" nav nav-pills nav-justified ">
        <li class="dropdown active">
          <a href="buzon_entrada.php" class="dropdow-toggle" >BUZON DE ENTADA</a>  
          <span class="glyphicon glyphicon-circle-arrow-down form-control-feedback"></span>    
        </li>
      </ul>
    </div>

    <div class="col-lg-4">
      <ul class=" nav nav-pills nav-justified ">
        <li class="dropdown active">
          <a href="quejas_enviadas.php" class="dropdow-toggle" style="background:#A3E4D7;color: #2980B9"><b>ENVIADOS</b></a>
          <span class="glyphicon glyphicon-circle-arrow-up form-control-feedback"></span>  
        </li>
       </ul>                   
    </div>

    <div class="col-lg-4" >
      <ul class=" nav nav-pills nav-justified ">
        <li class="dropdown active">
          <a href="quejas.php"  class="dropdow-toggle" >PETICIONES,QUEJAS Y RECLAMOS</a>  
          <span class="glyphicon glyphicon glyphicon-envelope form-control-feedback"></span> 
        </li>
      </ul>
   </div>   

    <br>
    <br>

    <div class="col-lg-12">             
    <h1>ELEMENTOS ENVIADAS</h1>
    <?php
      $nombre= $_SESSION["nombre"];
      $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");   
      if ($resultado = mysqli_query($conexion, "select idquejas,tipo ,queja from quejas where usuario='$nombre'")) {
        while ($fila = mysqli_fetch_row($resultado)) {
        echo "<br>"; 
        echo 
        "<div id='tbl_resultados'>
          <table>
            <form action='eliminar_mensaje_salida.php'  method='post'>
              <tr><td><b>".$fila[1].':'."</b></td><td>".$fila[2]."</td></tr>
              <tr><td><input value=".$fila[0]." name='codigo' style='display:none;'></td></tr>
              <tr><td><input style='background:#2980B9;color:white;border-radius:5px;'  type='submit' value='Eliminar mensaje'></td></tr>
            </form>     
          </table>   
        </div>";
        ;
        }
       mysqli_free_result($resultado);
      }               

    ?>           
    </div>
</div>

<div class="row  seccion"></div>
</div>

<!--FOOTER-->
<div class="row">
  <div class="col-lg-12 footer">
    <p>*JOSE DE JESUS MARTINEZ CABARCAS<br>
    Para resolver dudas, comentarios y sugerencias, comuníquese a la Línea de Atención 3023295087.  Copyright © Todos los derechos reservados.</p>
  </div>
</div>
</div>
</body>
</html>
<?php
}
else
{
 echo "acceso no autorizado";
  header("location:login.php");
}
?>
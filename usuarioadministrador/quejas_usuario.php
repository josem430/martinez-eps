<?php
session_start();
?>
<?php
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
  <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>        
  </button>
  <a href="" class="navbar-brand"><img  src="../img/milogo.png"></a>
 </div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background: #2980B9;">
 <ul class="nav navbar-nav navbar-right">
  <li style="margin-right:200px;"><H3>USUARIO ADMINISTRADOR</H3></li>
  <li><a href="usuarioadmin.php" > <?php  echo $_SESSION['nombre']; ?></a></li>
  <li><a href="../cerrar.php">Cerrar Seccion</a></li>
  <li><a href="#"><img class="user" src="../img/user.png"></a></li>
 </ul>
</div>
</div>
</nav>
</div>
</div>
<br>
<!--SECTION-->
<div class="row  seccion">
<div class="col-lg-12">
            
<H2>ENVIADOS POR USUARIOS</H2>
<?php
  $nombre= $_SESSION["nombre"];
  $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
  if ($resultado = mysqli_query($conexion, "select que.queja,que.tipo,
  concat(usu.usuapellido,usu.usunombre)
  from quejas que
  inner join usuarios usu on
  usu.USUARIO=que.usuario")) {
  while ($fila = mysqli_fetch_row($resultado)) {
   echo "<br>"; 
   echo 
    "<div id='tbl_resultados'>
     <table>  
      <form action='eliminar_mensaje.php'  method='post'>
      <tr><td><b>Usuario:</b></td><td>".$fila[2]."</td><td><b>Mensaje:</b></td><td>".$fila[0]."</td><td><b>Tipo:</b></td><td>".$fila[1]."</td></tr>
        </form>  
     </table>   
    </div>";
   }
   echo "<br>"; 
   mysqli_free_result($resultado);
   }               
?>         
<div class="row  seccion"></div>
</div>
<!--FOOTER-->
<div class="row" >
 <div class="col-lg-12 footer">
   <p>*JOSE DE JESUS MARTINEZ CABARCAS<br>
   Para resolver dudas, comentarios y sugerencias, comuníquese a la Línea de Atención 3023295087.  Copyright ©  Todos los derechos reservados.</p>
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

<?php
  Ob_start(); 
  Session_start();  
  require_once("enlaces/enlaces.html");

  if (isset($_SESSION['nombre'])){
?>

</head>

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
    <div class="row  seccion">
    <div class="col-lg-3" >  
      <ul class=" nav nav-pills nav-justified ">
        <li class="dropdown active">
         <a href="admin.php"  > <span class="glyphicon glyphicon-home "></span></a>
        </li>
      </ul>    
      <br>   
        <ul class=" nav nav-pills nav-justified ">
          <li class="dropdown active">
            <a href="" class="dropdow-toggle" data-toggle="dropdown">CONSULTAS <span class="glyphicon glyphicon-search form-control-feedback"></span><span class="caret"></span></a>
            <ul class="dropdown-menu nav-justified">
              <li>
                <a href="consultar_citas.php">CONSULTAR CITA</a>   
                <a href="resultados.php">CONSULTAR RESULTADOS</a>
              </li>         
            </ul>
          </li>
        </ul>
    </div>
    <div class="col-lg-9">        
     <h1>CONSULTAR CITAS</h1>
     <table class="table table-striped">
        <thead>
         <tr>
            <th>NOMBRE DEL MEDICO</th>
            <th>ESPECIALIDAD</th>
            <th>FECHA</th>
            <th>HORA</th>
            <th>CONSULTORIO</th>
          </tr>
        </thead>
        <tbody>
         <tr>
            <?php
            $nombre= $_SESSION["nombre"];
            $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");   
            if ($resultado = mysqli_query($conexion, "select  med.MEDNOMBRE,med.MEDESPECIALIDAD, prog.PROFECHA, prog.PROHORA, prog.PROCONSULTORIO from medico med inner join programacion prog on med.MEDNOMBRE=prog.MEDNOMBRE where prog.USUARIO='$nombre'")) {
                while ($fila = mysqli_fetch_row($resultado)){   
                echo   
                "<tr><td>".$fila[0]."</td>
                <td>".$fila[1]."</td>
                <td>".$fila[2]."</td>
                <td>".$fila[3]."</td>
                <td>".$fila[4]."</td></tr>";}
                mysqli_free_result($resultado);
            }               
            ?>      
         </tr> 
        </tbody>
      </table>            
    </div>
    </div>
    <!--FOOTER-->
    <div class="row">
     <div class="col-lg-12 footer">
     <p>*JOSE DE JESUS MARTINEZ CABARCAS<br>
     Para resolver dudas, comentarios y sugerencias, comuníquese a la Línea de Atención  3023295087.  Copyright © S.A. Todos los derechos reservados.</p>
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


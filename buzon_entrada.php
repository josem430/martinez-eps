<?php
Ob_start(); 
Session_start();  
require_once("enlaces/enlaces.html");

if (isset($_SESSION['nombre'])){  
?>

<script type="text/javascript">
    $(document).ready(function(){

      $("#buzon").html("");
      cargar_mensajes();      
    });

    function cargar_mensajes(){
      setInterval(function(){ 
        datos_personales(); 
      }, 1000);
    }

    function datos_personales(){
      var nombre= "<?php echo $_SESSION["nombre"]?>";
      $.ajax({
        type: 'POST',
        async: true,
        url: 'ajax/buzon_entrada.php',
        data: {
           nombre
        },
        success: function(data){
        console.log(data);
          html="";
          $(data.mensajes).each(function(){
            html+="<table>";  
            html+="<tr>";
            html+=" <td><b>De:</b></td><td>"+$(this)[0].de+"</td>";
            html+="<td><b>Fecha:</b></td><td>"+$(this)[0].fecha+"</td>";
            html+="<td><b>Mensaje:</b></td><td>"+$(this)[0].mensaje+"</td>";
            html+="</tr>";            
            html+="</table>";
          });
          $("#buzon").html(html);
        },
        dataType: 'json'
      });
  }
</script>
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
<div class="col-lg-12">

  <div class="col-lg-4">                
    <ul class=" nav nav-pills nav-justified ">
     <li class="dropdown active">
       <a href="buzon_entrada.php" class="dropdow-toggle" style="background:#A3E4D7;color: #2980B9">
       <b>BUZON DE ENTADA</b></a> 
       <span class="glyphicon glyphicon-circle-arrow-down form-control-feedback"></span>     
     </li>
    </ul>
  </div>

  <div class="col-lg-4">

    <ul class=" nav nav-pills nav-justified ">
      <li class="dropdown active">
        <a href="quejas_enviadas.php" class="dropdow-toggle">ENVIADOS</a>
        <span class="glyphicon glyphicon-circle-arrow-up form-control-feedback"></span>  
      </li>
    </ul>                  
  </div>

  <div class="col-lg-4" >
      <ul class=" nav nav-pills nav-justified ">
        <li class="dropdown active">
          <a href="quejas.php"  class="dropdow-toggle" >PETICIONES, QUEJAS Y RECLAMOS</a> 
          <span class="glyphicon glyphicon glyphicon-envelope form-control-feedback"></span>  
        </li>
      </ul>
   </div>   

    <br>
    <br>

    <div class="col-lg-12">
      <h1>BUZON ENTRADA</h1>
      <div id="buzon">
        
      </div>
     
    </div>

</div>

</div>
        <!--FOOTER-->
  <div class="row">
    <div class="col-lg-12 footer">
     <p>*JOSE DE JESUS MARTINEZ CABARCAS<br>
     Para resolver dudas, comentarios y sugerencias, comuníquese a la Línea de Atención 3023295087.  Copyright © Todos los derechos reservados.</p>
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


<?php
Ob_start(); 
Session_start();
require_once("enlaces/enlaces.html");

if (isset($_SESSION['nombre'])){  
?>

<script type="text/javascript">

  var usuario="<?php echo $_SESSION['nombre'] ?>";

  $(document).ready(function(){
    datos_personales();
  });

  function datos_personales(){
    $.ajax({
      type: 'POST',
      async: true,
      url: 'ajax/consultar_datos_personales.php',
      data: {
         usuario
      },
      success: function(data){
        console.log(data);
        html="";
        $(data.datos_personales).each(function(){
          html+="<tr><th scope='col'>DOC IDENTIDAD:</th><th scope='col'>"+$(this)[0].usuid+"</th></tr>";
          html+="<tr><th scope='col'>NOMBRES:</th><th scope='col'>"+$(this)[0].usunombre+"</th></tr>";
          html+="<tr><th scope='col'>APELLIDOS:</th><th scope='col'>"+$(this)[0].usuapellido+"</th></tr>";
          html+="<tr><th scope='col'>DIRECCION:</th><th scope='col'>"+$(this)[0].usudireccion+"</th></tr>";
          html+="<tr><th scope='col'>TELEFONO:</th><th scope='col'>"+$(this)[0].usutelefono+"</th></tr>";
          html+="<tr><th scope='col'>EMAIL:</th><th scope='col'>"+$(this)[0].email+"</th></tr>";
        });
        $("#tbl-datos-personales tbody").html(html);

        $("#nombre-usu").html(data.datos_personales.usunombre+data.datos_personales.usuapellido);

        $(data.foto).each(function(){
          $("#foto").append("<img style='width:350px;height: 350px;' src='"+$(this)[0].perfil+"'>");
        });  
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
         <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a href="" class="navbar-brand"><img  src="img/milogo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" id="aquello" style="background: #337ab7;">
          <ul class="nav navbar-nav navbar-right">
           <li><a href='admin.php' id="nombre-usu"></a></li>
           <li><a href="mensajes.php">Mensajes</a></li>
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
       <a href="" id="aquello" class="dropdow-toggle" data-toggle="dropdown">CONSULTAS  <span class="glyphicon glyphicon-search form-control-feedback"></span> <span class="caret"></span></a>
       <ul class="dropdown-menu nav-justified">
         <li>
           <a href="consultar_citas.php">CONSULTAR CITA</a>
           <a href="resultados.php">CONSULTAR RESULTADOS</a>
         </li>         
       </ul>
     </li>
    </ul>
  </div>

  <div class="col-lg-5"> 
  <h1>DATOS PERSONALES</h1>
     <div id="datos-personales">
      <table class="table table-striped" id="tbl-datos-personales">
        <tbody>
          
        </tbody>
      </table>
     </div>
  </div>
  
  <div class="col-lg-4">
    <div id="foto">
      
    </div>
  </div>

</div>
<!--FOOTER-->
     
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

<?php
Ob_start(); 
Session_start();  
?>
<?php
if (isset($_SESSION['nombre'])){
?>
<!doctype html>
<html class="no-js" lang="">
<?php
  require_once("enlaces/enlaces.html");
?>

<script type="text/javascript">
  var datos;
  $(document).ready(function(){
    $("#btn_enviar").bind("click", dialogo_enviar);
    $("#btn_enviados").bind("click", dialogo_enviados);
    $("#btn_enviado_usuario").bind("click", dialogo_enviados_usuarios);

    $("#window_enviar").dialog({
      bgiframe: true,
      width: 700,
      height: 450,
      modal: true,
      autoOpen: false,
      buttons: {
          'Salir': function(){
          $(this).dialog('close');
          document.form_enviar_mensaje.reset();
        }
      }   
    });

    $("#window_enviados").dialog({
      bgiframe: true,
      width: 850,
      height: 450,
      modal: true,
      autoOpen: false,
      buttons: {
          'Salir': function(){
          $(this).dialog('close');
          $("#tbl_mensajes_enviados").html("");
         // document.form_enviar_mensaje.reset();
        }
      }   
    });

    $("#window_enviados_usuario").dialog({
      bgiframe: true,
      width: 850,
      height: 450,
      modal: true,
      autoOpen: false,
      buttons: {
          'Salir': function(){
          $(this).dialog('close');
          $("#tbl_mensajes_enviados").html("");
         // document.form_enviar_mensaje.reset();
        }
      }   
    });
  });

  function dialogo_enviar(){
    $("#window_enviar" ).dialog('open');
  }

  function dialogo_enviados(){
    $("#window_enviados").dialog('open');
    cargar_mensajes_enviados();
  }

  function dialogo_enviados_usuarios(){
    $("#window_enviados_usuario").dialog('open');
    cargar_enviados_usuarios();
  }

  function cargar_enviados_usuarios(){
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/consultar_mensajes_de_usuarios.php',
    data: {
    },
    success: function(data){
      console.log(data);
      html="";
      $(data.resultado).each(function(){
        html+="<tr>";
        html+="<td><b>Usuario:</b></td><td width='40%'>"+$(this)[0].usuario+"</td>";
        html+="<td><b>Mensaje:</b></td><td width='55%'>"+$(this)[0].queja+"</td>";
        html+="<td><b>Tipo:</b></td><td width='5%'>"+$(this)[0].tipo+"</td>";
        html+="</tr>";   
      });
      $("#tbl_enviado_usuario").append(html);
    },
    dataType: 'json'
    });
  }

  function cargar_mensajes_enviados(){
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/cargar_mensajes_enviados.php',
    data: {
    },
    success: function(data){
      console.log(data);
      datos=data;
      html="";
      $(data.mensajes).each(function(){
        html+="<tr>";
        html+="<td><b>De:</b></td><td width='10%'>"+$(this)[0].de+"</td>";
        html+="<td><b>Para:</b></td><td width='30%'>"+$(this)[0].usuario+"</td>";
        html+="<td><b>Fecha:</b></td><td width='15%'>"+$(this)[0].fecha+"</td>";
        html+="<td><b>Mensaje:</b></td><td width='40%'>"+$(this)[0].mensaje+"</td>";       
        html+="<td><input type='button' class='btn btn-danger' onClick='conf_enviados("+$(this)[0].idmensaje+")' value='Eliminar'></td>";
        html+="</tr>";
      });
      $("#tbl_mensajes_enviados").append(html);
    },
    dataType: 'json'
    });
  }

  function conf_enviados(idmensaje){
    $.confirm({
      theme: 'supervan',
      title:'¿Desea eliminar este mensaje?',
      content:'',
      buttons: {
        'si': function(){
            eliminar_enviados(idmensaje);
        },
        'No': function(){
        }
      } 
    });
  }

  function eliminar_enviados(idmensaje){
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/eliminar_mensajes_enviados.php',
    data: {
      idmensaje
    },
    success: function(data){
      console.log(data);
      $.alert({
          title: 'Alerta!!!',
          content: ''+data.mensaje+'',
      });
      $("#tbl_mensajes_enviados").html("");
      cargar_mensajes_enviados()
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
     <a href="" class="navbar-brand"><img  src="../img/milogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background: #2980B9;">
     <ul class="nav navbar-nav navbar-right">
      <li style="margin-right:200px;"><H3>USUARIO ADMINISTRADOR</H3></li>
      <li><a href="usuarioadmin.php" > <?php  echo $_SESSION['nombre']; ?></a></li>
      <li><a href="registrar_medicos.php"><p>Registar Medicos</p></a></li>
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
 <!--CONSULTAS-->
  <div class="col-lg-12">
   <H2>CONSULTAS</H2> 
   
   <div class="col-lg-4">
     <ul class=" nav nav-pills nav-justified ">
       <li class="dropdown active">
        <a href="asignarcita.php" class="dropdow-toggle">ASIGNAR CITA</a>
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>    
       </li>
     </ul>
   </div>

   <div class="col-lg-4" >
      <ul class=" nav nav-pills nav-justified ">
       <li class="dropdown active">
          <a href="cancelar.php"  class="dropdow-toggle" >CANCELAR CITA</a> 
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>  
       </li>
      </ul>
   </div>

   <div class="col-lg-4">
      <ul class=" nav nav-pills nav-justified">
       <li class="dropdown active"> 
        <a href="buscar_cita.php" class="dropdow-toggle">CONSULATAR CITA</a>
        <span class="glyphicon glyphicon-zoom-in form-control-feedback"></span>    
       </li>
      </ul> <br>                 
   </div>
  </div>

  <!--MENSAJES-->
 <div class="col-lg-12">
  <H2>MENSAJES</H2>

  <div class="col-lg-4" >
   <ul class=" nav nav-pills nav-justified ">
    <li class="dropdown active">
    <a href="#" id="btn_enviar" class="dropdow-toggle">ENVIAR MENSAJE</a> 
    <span class="glyphicon glyphicon glyphicon-envelope form-control-feedback"></span>
    </li>
   </ul>

    <div id="window_enviar" title="ENVIAR MENSAJE">
      
      <form  id="form_enviar_mensaje" name="form_enviar_mensaje" action="enviomensaje.php" method="post">
        <div class="col-lg-5"> 
          <b>DE:</b>
          <input type="text" name="de" value="MARTINEZ E.P.S" class="form-control" readonly="">
          <b>PARA:</b>
          <select  name="paciente" class="form-control" required="">

          <option value="0" >Paciente</option>
            <?php
              $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
              $consulta=mysqli_query($conexion,"select *from usuarios");
              while (($fila = mysqli_fetch_array($consulta)) != NULL) {
              echo '<option value="'.$fila["USUARIO"].'">'.$fila["USUNOMBRE"]." ".$fila["USUAPELLIDO"].'</option>'; }
            ?> 
          </select>
          <b>FECHA:</b>  
          <input type="date" name="fecha" class="form-control"> 
        </div>

        <div class="col-lg-10">
          <b>MENSAJE:</b>
          <textarea name="mensaje" id="mensaje" class="form-control" cols="60" rows="4"></textarea>
        </div>

        <div class="col-lg-4">
          <input type="submit" name="" value="Enviar Mensaje" class="form-control">               
        </div>            
      </form>     
    </div>
  </div>

  <div class="col-lg-4" >
   <ul class=" nav nav-pills nav-justified ">
    <li class="dropdown active">
     <a href="#" id="btn_enviados" class="dropdow-toggle" >MENSAJES ENVIADOS</a> 
     <span class="glyphicon glyphicon-upload form-control-feedback"></span>  
    </li>
   </ul>

    <div id="window_enviados" title="MENSAJES ENVIADOS">
      <table id="tbl_mensajes_enviados">
      </table>     
    </div>
  </div>

  <div class="col-lg-4" >
   <ul class=" nav nav-pills nav-justified ">
    <li class="dropdown active">
     <a href="#" id="btn_enviado_usuario" class="dropdow-toggle" >ENVIADOS POR USUARIOS</a> 
     <span class="glyphicon glyphicon-download form-control-feedback"></span>  
     </li>
    </ul>

    <div id="window_enviados_usuario" title="MENSAJES DE USUARIOS">
      <table id="tbl_enviado_usuario">
        
      </table>
    </div>

   </div>

  </div>
<div class="row  seccion"></div>
</div>
<!--FOOTER-->
<div class="row" >
 <div class="col-lg-12 footer " >
  <p>*JOSE DE JESUS MARTINEZ CABARCAS<br>
  Para resolver dudas, comentarios y sugerencias, comuníquese a la Línea de Atención 3023295087.  Copyright ©  Todos los derechos reservados.</p>
 </div>
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


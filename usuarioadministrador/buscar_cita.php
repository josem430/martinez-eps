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

<script type="text/javascript">
  $(document).ready(function(){
    $("#consultar").bind("click", mostrar);
  });

  function mostrar(){
    $("#form-consulta").hide();
    $("#div_resultado").show();
    var usuario=$("#usuario").val();
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/consultar_cita.php',
    data: {
      usuario
    },
    success: function(data){
      console.log(data);
      if(data.datos_usuario==""){
        alert("NO SE ENCUENTRA PACIENTE CON ESTE NOMBRE: "+$("#usuario").val()+" ");
        $("#div_resultado").hide();
        location.reload(true);
      }
      else{
        html="";
        $(data.datos_usuario).each(function(){
          html+="<tr><th scope='col'>DOC IDENTIDAD:</th><th scope='col'>"+$(this)[0].usuid+"</th></tr>";
          html+="<tr><th scope='col'>NOMBRES:</th><th scope='col'>"+$(this)[0].usunombre+"</th></tr>";
          html+="<tr><th scope='col'>APELLIDOS:</th><th scope='col'>"+$(this)[0].usuapellido+"</th></tr>";
          html+="<tr><th scope='col'>DIRECCION:</th><th scope='col'>"+$(this)[0].usudireccion+"</th></tr>";
          html+="<tr><th scope='col'>TELEFONO:</th><th scope='col'>"+$(this)[0].usutelefono+"</th></tr>";
          html+="<tr><th scope='col'>EMAIL:</th><th scope='col'>"+$(this)[0].email+"</th></tr>";
        });
        $("#tbl-datos-personales tbody").html(html);
      }
      
      if (data.datos_cita=="") {
        $("#div_resultado").html("<H1>NO TIENE CITAS PENDIENTE</H1>");
      }
      else{
        html="";
        $(data.datos_cita).each(function(){
          html+="<tr>";
          html+="<td>"+$(this)[0].MEDNOMBRE+"</td>";
          html+="<td>"+$(this)[0].MEDESPECIALIDAD+"</td>";
          html+="<td>"+$(this)[0].PROFECHA+"</td>";
          html+="<td>"+$(this)[0].PROHORA+"</td>";
          html+="<td>"+$(this)[0].PROCONSULTORIO+"</td>";
          html+="<tr>";
        });
        $("#tbl-resultado tbody").html(html);    
      }
    },
    dataType: 'json'
    });
  }
</script>

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
        <a href="" class="navbar-brand"><img  src="../img/milogo.png"></a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background: #2980B9;">
        <ul class="nav navbar-nav navbar-right">
          <li style="margin-right:200px;"><H3>USUARIO ADMINISTRADOR</H3></li>
          <li><a href="usuarioadmin.php"> <?php  echo $_SESSION['nombre']; ?></a></li>
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
    <div class="col-lg-5" id="form-consulta">
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="BUSQUEDA POR USUARIO, NOMBRES O APELLIDOS" ><BR>
        <input type="button" name="" value="Consultar" id="consultar" class="form-control btn btn-primary"> 
    </div>

    <div class="col-lg-5 " id="div_datos_personales">
      <table class="table table-striped" id="tbl-datos-personales">
        <tbody>
          
        </tbody>
      </table>
    </div>

    <div id="div_resultado" class="col-lg-12" style="display: none;">
      <table class="table" id="tbl-resultado">
        <thead class="thead-light">
          <tr>
            <th>MEDICO</th>
            <th>ESPECIALIDAD</th>
            <th>FECHA</th>
            <th>HORA</th>
            <th>CONSULTORIO</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
   
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
else{
echo "acceso no autorizado";
header("location:../loginadmi.php");
}
?>
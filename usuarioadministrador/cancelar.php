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
  var rel;
  $(document).ready(function(){
    cargar_citas();
    $("#btn-consulta").bind("click", consultar);
  });

  function cargar_citas(){
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/cargar_citas_eliminar.php',
    data: {
    },
    success: function(data){
      console.log(data);
      html="";
      $(data.datos_cita).each(function(){ 
        html+="<tr>";
        html+="<td>"+$(this)[0].usuario+"</td>";
        html+="<td>"+$(this)[0].MEDNOMBRE+"</td>";
        html+="<td>"+$(this)[0].MEDESPECIALIDAD+"</td>";
        html+="<td>"+$(this)[0].PROFECHA+"</td>";
        html+="<td>"+$(this)[0].PROHORA+"</td>";
        html+="<td>"+$(this)[0].PROCONSULTORIO+"</td>";
        html+="<td><input type='button' class='btn btn-danger' value='Eliminar' onclick='eliminar("+$(this)[0].PROCODIGO+")'></td>";
        html+="</tr>";
      });
      $("#tbl_citas tbody").append(html);
    },
    dataType: 'json'
    });
  }

  function eliminar(PROCODIGO){
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/eliminar_citas.php',
    data: {
      PROCODIGO
    },
    success: function(data){
      console.log(data);
      alert(data.mensaje);
    },
    dataType: 'json'
    });   
    location.reload(true);
  }

  function consultar(){
      usuario=$("#usuario").val();
      $.ajax({
      type: 'POST',
      async: true,
      url: 'ajax/consultar_para_eliminar.php',
      data: {
        usuario
      },
      success: function(data){
        console.log(data);
        html="";
        if (data.datos_cita=="") {
          alert("NO SE ENCONTRARON DATOS CON ESTE NOMBRE");
        }
        else{
          $("#tbl_citas tbody").html("");
          html="";
          $(data.datos_cita).each(function(){ 
            html+="<tr>";
            html+="<td>"+$(this)[0].usuario+"</td>";
            html+="<td>"+$(this)[0].MEDNOMBRE+"</td>";
            html+="<td>"+$(this)[0].MEDESPECIALIDAD+"</td>";
            html+="<td>"+$(this)[0].PROFECHA+"</td>";
            html+="<td>"+$(this)[0].PROHORA+"</td>";
            html+="<td>"+$(this)[0].PROCONSULTORIO+"</td>";
            html+="<td><input type='button' class='btn btn-danger' value='Eliminar' onclick='eliminar("+$(this)[0].PROCODIGO+")'></td>";
            html+="</tr>";
          });
          $("#tbl_citas tbody").append(html);
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
          <li><a href="cerrar.php">Cerrar Seccion</a></li>
          <li><a href="#"><img class="user" src="../img/user.png"></a></li>         
        </ul>
      </div>
    </div>
  </nav>
 </div>
</div>
<br>

<!--SECTION-->
<div class="row  seccion" id="div_citas">
 <div class="col-lg-12">    
  <h1>CANCELAR CITAS</h1>

  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Nombres o apellidos"  aria-describedby="basic-addon2" id="usuario">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" id="btn-consulta" type="button">Consultar</button>
    </div>
  </div>
    
  <table class="table" id="tbl_citas">
  <thead>
   <tr>
    <th>NOMBRE DEL USUARIO</th>
    <th>NOMBRE DEL MEDICO</th>
    <th>ESPECIALIDAD</th>
    <th>FECHA</th>
    <th>HORA</th>
    <th>CONSULTORIO</th>
    <th>CANCELAR</th>
   </tr>
  </thead>
  <tbody>
    
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


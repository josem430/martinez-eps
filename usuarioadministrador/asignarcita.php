<?php
session_start();
if (isset($_SESSION['nombre'])){
?>
<!DOCTYPE html>
<html class="no-js" lang=""> 

<?php
  require_once("enlaces/enlaces.html");
?>

<script type="text/javascript">

  var usuario="<?php echo $_SESSION['nombre'] ?>";

  $(document).ready(function(){
    cargar_consultas();
  });

  function cargar_consultas(){
    $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/consultas_administrativas.php',
    data: {
       usuario
    },
    success: function(data){
      console.log(data);
      html="";
      $(data.medicos).each(function(){
        html+="<option value="+$(this)[0].MEDCODIGO+">"+$(this)[0].MEDNOMBRE+"-"+$(this)[0].MEDESPECIALIDAD+"</option>";
      }); 
      $("#medico").append(html);
      
      html="";
      $(data.usuarios).each(function(){
        html+="<option value="+$(this)[0].USUARIO+">"+$(this)[0].USUNOMBRE+"-"+$(this)[0].USUAPELLIDO+"</option>";
      });
      $("#paciente").append(html);
    },
    dataType: 'json'
    });
  }  
</script>

<body>
<div class="container">
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
<br>
<!--SECTION-->
<div class="row  seccion">
<div class="col-lg-12">
<div class="col-lg-6">
 <h1>ASIGNAR CITA </h1>
 <form class="form" id="form-asignar" action="guardarcita.php" method="POST">
  <select name="medico" class="form-control" id="medico" >
   <option value="0" >Seleccione un Medico</option>
     
  </select>
  <br>
  <input type="date" name="fecha" class="form-control" ><br>
  <input type="time" name="hora" class="form-control" ><br>
  <select name="consultorio" class="form-control" >
    <option value="">Consultorio</option>
    <option value="201">201</option>
    <option value="202">202</option>
    <option value="203">203</option>
  </select>
  <br>
  <select  name="paciente" id="paciente" class="form-control" >
    <option value="0" >Paciente</option>    
  </select>
  <br>
  <input type="submit" id="btn-enviar" value="Asignar Cita" class="form-control btn btn-primary">           
 </form>
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


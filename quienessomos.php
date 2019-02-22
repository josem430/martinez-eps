<?php
Ob_start(); 
Session_start();  
?><!doctype html>
<html class="no-js" lang=""> 
<?php
  require_once("enlaces/enlaces.html");
?>

<body>
<div class="container principal">
<div class="row">
  <div class="col-lg-12">
  <!-- MENU -->
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background: #2980B9;">
   <div class="container-fluid">
     <div class="navbar-header" >
       <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
        <span class="icon-bar" ></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>     
       </button>
       <a href="" class="navbar-brand" style="color: white"><img src="img/milogo.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav navbar-right" style="background: #2980B9;">
        <li ><a href="admin.php" style="color: white">INICIO</a></li>
       </ul>
      </div>
   </div>
  </nav>
  </div>
</div>
    
<div class="row">
 <div class="col-lg-12">
 <!-- SLIDER -->
 <div class="carousel slide" id="mislide" data-ride="carousel">
  <ol class="carousel-indicators">
   <li data-target="#mislide" data-slide-to="0" class="active"></li>
   <li data-target="#mislide" data-slide-to="1"></li>
   <li data-target="#mislide" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   <div class="item active">
    <img src="img/s3.png" alt="imagen1">
    <div class="carousel-caption">
     <h1 style="color: #1A5276">¿QUE ES MARTINEZ E.P.S?</h1>
     <p style="color: #1A5276">Es una de las empresas más sólidas e importantes de Latinoamérica con más de 73 años de experiencia en banca, seguros y retiro, presente en varios mercados financieros como Nueva York y Madrid..</p>
    </div>
   </div>
   <div class="item ">
     <img src="img/s2.png" alt="imagen2">
     <div class="carousel-caption">
       <h1  style="color: #1A5276">¿QUIÉN ES MARTINEZ E.P.S ASSET MANAGEMENT?</h1>
       <p  style="color: #1A5276">MARTINEZ E.P.S Asset Management es una Compañía latinoamericana con operaciones en las áreas de Pensiones, Ahorro e Inversión en México, Perú, Chile, Colombia, Uruguay y El Salvador. 
       </p>
     </div>
   </div>
   <div class="item ">
    <img src="img/s4.png" alt="imagen3">
    <div class="carousel-caption">
      <div class="row">
       <div class="col-xs-12 col-sm-12">
         <h1 style="color: #1A5276">CONTACTANOS</h1>
       </div>
       <div class="hidden-xs col-sm-12">
        <p style="color: #1A5276">si no te seintes bien y no sabes que hacer,toma el control y elije la mejor opcion:<BR>
         LLAMA AL SERVICIO DE ORIENTACION EN SALUD. </p>
       </div>
      </div>
    </div>
   </div>             
  </div>
  <a href="#mislide" class="carousel-control left" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a href="#mislide" class="carousel-control right" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  </div>
 </div>
</div>

<div class="row">
<div class="col-lg-9">
<!--CONTENIDO-->
<div class="container-fluid">
 <br>
 <h2>Principios corporativos​</h2>
 <hr>
 <h3>Equidad:</h3>
 <p> Entendida como el trato justo y equilibrado en la relación laboral, comercial y/o cívica con nuestros empleados, asesores, accionistas, clientes, proveedores y con la comunidad en general. Igualdad de trato para con todas las personas, independientemente de sus condiciones sociales, económicas, raciales, sexuales y de género.</p><br>
           
 <h3>Transparencia:</h3>
 <p> Las relaciones con la Compañía están basadas en el conocimiento, dentro de los límites de la ley y la reserva empresarial, de toda la información con base en la cual se rigen nuestras actuaciones.</p><br>

 <h3>Respeto:</h3>
 <p>Significa que más allá del cumplimiento legal de las normas y de los contratos pactados con nuestros empleados, asesores, accionistas, clientes, proveedores y con la comunidad en general, tenemos presente sus puntos de vista, necesidades y opiniones. Implica reconocer al otro y aceptarlo tal como es.</p><br>

 <h3>Responsabilidad:</h3>
 <p>La intención inequívoca de cumplir con nuestros compromisos, velando por los bienes tanto de la Compañía como de nuestros accionistas, clientes, proveedores y de la comunidad en general.</p><br>
 <div >
 <img src="img/m.png" style="float: left;" class="imgm">
  <h2>Nuestra Misión</h2>
  <p>Generar valor y confianza acompañando a las personas y organizaciones en su desarrollo, con empresas que ofrecen servicios financieros, de aseguramiento y afines basados en la gestión integral del riesgo y el largo plazo.</p>
  <hr>
  <h2>Nuestra Visión​​</h2>
  <p>Ser reconocido en 2020 como un grupo multilatino de servicios financieros integrales que genera valor y confianza.​​​​​​</p>
 </div>
</div>  
</div>
<div class="col-lg-3" id="aside" >
<!--ASIDE-->
  <br>
  <h5>DROGUERIAS RECOMENDADAS</h5>
  <img src="img/a1.png">
  <hr>
  <img src="img/a2.png">
  <hr>
  <img src="img/a3.png">
  <hr>
  <img src="img/a4.png">
  <hr>
  <img src="img/a5.png">
</div>
</div>

<div class="col-lg-12">
<!-- FOOTER-->
<footer class="footer " style="background: #2980B9; color:white;" >
<div class="container">
 <p>*JOSE DE JESUS MARTINEZ CABARCAS-CENTRO INCA COD183.<br>
  Para resolver dudas, comentarios y sugerencias, comuníquese a la Línea de Atención al Inversionista 01 8000 521 555.  Copyright © Grupo de Inversiones Suramericana S.A. Todos los derechos reservados.</p>
</div>
</footer>
</div>   
</div>
</body>
</html>

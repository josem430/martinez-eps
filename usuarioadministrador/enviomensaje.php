<!DOCTYPE html>
<html lang="es">
<?php
  require_once("enlaces/enlaces.html");
?>
<body  >
<?php

 $fecha=$_POST['fecha'];
 $usuario=$_POST['paciente'];
 $mensaje=$_POST['mensaje'];
 $de=$_POST['de'];
 $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
 if (!$consulta=mysqli_query($conexion,"insert into mensajes (idmensaje,usuario,fecha,mensaje,de) values ('','$usuario','$fecha','$mensaje','$de')"))
 {
       die(mysql_error("NO SE ENVIO")); 
 }
 else
 {
 	echo "<script>";
    echo "alert('Mensaje enviado');";  
    echo "window.location = 'usuarioadmin.php';";
    echo "</script>";
 }

?>

</body>

</HTML>
<!DOCTYPE html>
<html lang="es">
<?php
  require_once("enlaces/enlaces.html");
?>
<body  >
<?php
$conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");

$cancelar=$_POST['cancelar'];
$consulta=mysqli_query($conexion,"delete from programacion where PROCODIGO='$cancelar'");
mysqli_close($conexion); 

echo "<script>";
echo "alert('CITA CANCELADA');";  
echo "window.location ='cancelar.php';";
echo "</script>";
?>
</body>

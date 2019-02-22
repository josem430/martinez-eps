<!DOCTYPE html>
<html lang="es">
<?php
  require_once("enlaces/enlaces.html");
?>
<body  >
<?php
$conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
$nombre=$_POST["nombre"];
$especialidad=$_POST["especialidad"];
$telefono=$_POST["telefono"];

$consulta=mysqli_query($conexion,"insert into medico (MEDNOMBRE,MEDESPECIALIDAD,MEDTELEFONO)  values ('$nombre','$especialidad','$telefono')");
if (! $consulta) {
	echo "<script>";
	echo "alert('No se pudo registrar el medico');";  
	echo "window.location = '../usuarioadmin.php';";
	echo "</script>";
}
else {
echo "<script>";
echo "alert('Registro Exitoso!!!');";  
echo "window.location = '../usuarioadmin.php';";
echo "</script>";
}
?>
</body>
</HTML>
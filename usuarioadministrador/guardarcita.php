<!DOCTYPE html>
<html lang="es">
<?php
  require_once("enlaces/enlaces.html");
?>
<body  >
<?php
 $medico=$_POST['medico'];
 $fecha=$_POST['fecha'];
 $hora=$_POST['hora'];
 $consultorio=$_POST['consultorio'];
 $paciente=$_POST['paciente'];

 $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
 $sql="INSERT into programacion (PROCODIGO,MEDCODIGO,PROFECHA,PROHORA,PROCONSULTORIO,USUARIO)  values ('','$medico','$fecha','$hora','$consultorio','$paciente')";

 if(!$result= $conexion->query($sql)){
    echo "<script>";
	echo "alert('no se grabo la cita');";  
    echo "window.location = 'asignarcita.php';";
	echo "</script>";
 }
 else{
 	echo "<script>";
	echo "alert('Cita guardada');";  
    echo "window.location = 'asignarcita.php';";
	echo "</script>";
 }
?>
</body>

</HTML>
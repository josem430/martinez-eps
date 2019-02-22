<?php

Session_start();  
Ob_start();
 
$usuario=$_SESSION['nombre']; 
$conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");  
$consulta=mysqli_query($conexion,"select PERFIL from usuarios where USUARIO='$usuario'");

$resultado=array(); 
  
while ($fila=mysqli_fetch_array($consulta) ) 
{
	$resultado[]=$fila;
}

mysqli_close($conexion);
echo json_encode($resultado);
?>
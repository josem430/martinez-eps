<?php
  require_once("../BD/conexion.php");

  $usuario=$_POST["usuario"];
  $arrayReturn=array();
  $arrayReturn["datos_personales"]=array();
  $arrayReturn["foto"]=array();
   
  //CONSULTA DATOS PERSONALES
  $sql=mysqli_query($conexion, "SELECT usuid, usunombre, usuapellido,usudireccion,usutelefono, email from usuarios where usuario='$usuario'");
  $fila=mysqli_fetch_assoc($sql);
  $arrayReturn["datos_personales"]=$fila;
   
  //CONSULTA PERFIL
  $sql=mysqli_query($conexion,"SELECT perfil from usuarios where usuario='$usuario'");
  $fila=mysqli_fetch_assoc($sql);
  $arrayReturn["foto"]=$fila;

  echo json_encode($arrayReturn);
?>
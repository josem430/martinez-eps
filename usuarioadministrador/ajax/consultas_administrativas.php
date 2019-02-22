<?php
  require_once("../../BD/conexion.php");

  $nombre=$_POST["usuario"];

  $arrayReturn=array();
  //CONSULTA MEDICO
  $sql="SELECT * from medico";
  if(!$result= $conexion->query($sql)){
    die('Ha ocurrido un error en la consulta de datos [' . $db->error . ']');
  }
  $arrayReturn["medicos"]=$result->fetch_all(MYSQLI_BOTH);
  
  //CONSULTA USUARIOS
  $sql="SELECT * from usuarios";
  if(!$result= $conexion->query($sql)){
    die('Ha ocurrido un error en la consulta de datos [' . $db->error . ']');
  }
  $arrayReturn["usuarios"]=$result->fetch_all(MYSQLI_BOTH);

  echo json_encode($arrayReturn);
?>
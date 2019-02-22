<?php 

  require_once("../../BD/conexion.php");

  $arrRetorno=array();

  $sql="SELECT que.queja,
  que.tipo,
  concat(usu.usuapellido,usu.usunombre) as usuario

  FROM quejas que
  
  INNER JOIN usuarios usu ON
  usu.USUARIO=que.usuario";

  if (!$resultado=$conexion->query($sql)) {
    die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
  }

  $arrRetorno["resultado"]=$resultado->fetch_all(MYSQLI_BOTH);

  echo json_encode($arrRetorno);               
?>
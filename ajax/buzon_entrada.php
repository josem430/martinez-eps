<?php
  require_once("../BD/conexion.php");

  $retorno=array();
  
  $nombre= $_POST["nombre"];

  $sql="SELECT idmensaje,de, fecha,mensaje from mensajes where usuario='$nombre'";

  if (!$resultado=$conexion->query($sql)) {
    die("error"); 
  }

  $retorno["mensajes"]=$resultado->fetch_all(MYSQLI_BOTH);


  echo json_encode($retorno);                
?>        
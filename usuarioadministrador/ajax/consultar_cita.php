<?php
  require_once("../../BD/conexion.php");
  
  $nombre=$_POST["usuario"];

  $arrayReturn=array();

  $sql="SELECT 
  usuid, 
  usunombre, 
  usuapellido,
  usudireccion,
  usutelefono, 
  email 
  FROM usuarios 

  WHERE  usuario='$nombre' or USUNOMBRE like '%$nombre%' or USUAPELLIDO like '%$nombre%'";

  if(!$result= $conexion->query($sql)){
    die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
  }

  $arrayReturn["datos_usuario"]=$result->fetch_all(MYSQLI_BOTH);

  $sql="SELECT  
  med.MEDNOMBRE,
  med.MEDESPECIALIDAD, 
  prog.PROFECHA, 
  prog.PROHORA, 
  prog.PROCONSULTORIO 
  FROM programacion prog 

  INNER JOIN medico med ON
  prog.MEDCODIGO=med.MEDCODIGO
  
   INNER JOIN usuarios usu on
  prog.USUARIO=usu.USUARIO
  
  where prog.usuario='$nombre' or usu.USUNOMBRE like '%$nombre%' or usu.USUAPELLIDO like '%$nombre%'";
  
  if(!$result= $conexion->query($sql)){
    die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
  }
  $arrayReturn["datos_cita"]=$result->fetch_all(MYSQLI_BOTH);

  echo json_encode($arrayReturn);
?>
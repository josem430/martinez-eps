<?php
require_once("../../BD/conexion.php");

 $arrRetorno=array();

 $codigo=$_POST['idmensaje'];

 $sql="DELETE FROM mensajes WHERE idmensaje='$codigo'";

 if (!$resultado=$conexion->query($sql)){
 	$arrRetorno["mensaje"]="NO SE PUEDO ELIMINAR";
 }
 else{
 	$arrRetorno["mensaje"]="ELIMINADO CORRECTAMENTE";
 }

 echo json_encode($arrRetorno);
?>
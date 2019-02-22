<?php
    require_once("../../BD/conexion.php");

	$arrRetorno=array();
    
    $codigo_programacion=$_POST["PROCODIGO"];
	
	$sql="DELETE from programacion where PROCODIGO='$codigo_programacion'";

	if(!$result= $conexion->query($sql)){
    	$arrRetorno["mensaje"]="NO SE ELIMINO LA CITA";
    }
    else{
    	$arrRetorno["mensaje"]="CITA CANCELADA";
    }

	echo json_encode($arrRetorno);
?>
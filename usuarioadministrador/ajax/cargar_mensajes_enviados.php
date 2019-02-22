<?php
	require_once("../../BD/conexion.php");

	$arrRetorno=array();

    $sql="SELECT 
    	men.idmensaje,
    	men.de, 
    	men.fecha,
    	men.mensaje,
        concat(usu.usuapellido,' ',usu.usunombre) as usuario

        FROM mensajes men

		INNER JOIN usuarios usu ON
        usu.USUARIO=men.usuario";

    if(!$resultado=$conexion->query($sql)){
    	die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
    }
    
    $arrayRetorno["mensajes"]=$resultado->fetch_all(MYSQLI_BOTH);
    
	echo json_encode($arrayRetorno);
?>
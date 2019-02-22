<?php
	require_once("../../BD/conexion.php");  
    
	$nombre=$_POST["usuario"];

	$arrayReturn=array();
	
    if ($nombre=="") {
    	
	}
    else{
    	$sql="SELECT  
		concat(usu.USUNOMBRE,usu.USUAPELLIDO) as usuario,
		med.MEDNOMBRE,
		med.MEDESPECIALIDAD, 
		prog.PROFECHA, 
		prog.PROHORA,
		prog.PROCONSULTORIO, 
		prog.PROCODIGO 

		FROM programacion prog

		INNER JOIN medico med ON 
		prog.MEDCODIGO=MED.MEDCODIGO

		INNER JOIN usuarios usu ON 
		usu.USUARIO=prog.USUARIO
		
		WHERE usu.USUNOMBRE like '%$nombre%' or usu.USUAPELLIDO like '%$nombre%'";

		if(!$result= $conexion->query($sql)){
	    	die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
		}

		$arrayReturn["datos_cita"]=$result->fetch_all(MYSQLI_BOTH);
    }
    echo json_encode($arrayReturn);
?>
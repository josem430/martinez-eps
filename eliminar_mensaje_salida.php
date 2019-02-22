<?php
	Ob_start(); 
	Session_start();  
?>

<?php
 $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
 $usuario=$_SESSION['nombre']; 
 $codigo=$_POST['codigo'];
 $consulta=mysqli_query($conexion,"delete from quejas where idquejas='$codigo' and usuario='$usuario'");
 mysqli_close($conexion); 
 echo "<script>";
 echo "alert('ELIMINADO CORECTAMENTE');";  
 echo "window.location = 'quejas_enviadas.php';";
 echo "</script>";
?>


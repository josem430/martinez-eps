<?php
Ob_start(); 
Session_start();  
?>
<!DOCTYPE html>
<html lang="es">
<?php
  require_once("enlaces/enlaces.html");
?>
<body>
<?php
 $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
 $usuario=$_POST['usuario'];
 $act_contra=$_POST['actcontra'];
 $contra1=$_POST['contra1'];
 $contra2=$_POST['contra2'];
 $consulta_p=mysqli_query($conexion,"select USUPASSWORD from usuarios where USUARIO='$usuario'");
 $fila=mysqli_fetch_array($consulta_p);
 $n=$fila[0];

 if ($n==$act_contra){
	if($contra1==$contra2){
	 	$consulta=mysqli_query($conexion,"update usuarios set USUPASSWORD='$contra1' where USUARIO='$usuario'");
		mysqli_close($conexion); 
		echo "<script>";
		echo "alert('LA CONTRASEÑA SE HA CAMBIADO CORRECTAMENTE');";  
		echo "window.location ='login.php';";
		echo "</script>";
	}
	else{
	 	echo "<script>";
		echo "alert('VERIFICAR LA NUEVA CONTRASEÑA,NO COINCIDEN');";  
		echo "window.location = 'nueva_contraseña.php';";
		echo "</script>";
	}					
 }
 else{
   echo "<script>";
   echo "alert('SU ACTUAL CONTRASEÑA NO COINCIDE');";  
   echo "window.location = 'nueva_contraseña.php';";
   echo "</script>";
 }
?>
</body>
</HTML>
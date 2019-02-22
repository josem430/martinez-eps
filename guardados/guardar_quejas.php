<!DOCTYPE html>
<html lang="es">
<head>
 <TITLE>JOSE MARTINEZ</TITLE>
 <META CHARSET="UTF-8">
 <meta name="keywords" content="">
 <meta name="autor" content="JOSE MARTINEZ">
  <link rel="shortcut icon" href="img/jlogo.png">
 <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0, maximum-scale=1.0,minimun-scale=1.0">
 <link rel="stylesheet" type="text/css" href="engine1/style.css">
 <script type="text/javascript" src="engine1/jquery.js"></script>
</head>
<body  >
<?php
    session_start();
 ?>
<?php
$conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
$usuario=$_SESSION['nombre']; 
$quejas=$_POST['quejas'];
$tipo=$_POST['tipo'];

$consulta=mysqli_query($conexion,"insert into quejas (idquejas,usuario,queja,tipo)  values ('','$usuario','$quejas','$tipo')");

mysqli_close($conexion); 

echo "<script>";
echo "alert('ENVIADO CORRECTAMENTE, PRONTO LO CONTACTAREMOS');";  
echo "window.location = '../quejas.php';";
echo "</script>";
?>

</body>

</HTML>
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
 $conexion=mysqli_connect("localhost","root","","id7525596_martinez_eps");
 $usuario=$_POST['usuario'];
 $password=$_POST['contra'];
 $id=$_POST['id'];
 $nombres=$_POST['nombres'];
 $apellidos=$_POST['apellidos'];
 $direccion=$_POST['direccion'];
 $telefono=$_POST['telefono'];
 $email=$_POST['email'];
 $nombrei=$_FILES["imagenes"]["name"];


$consulta=mysqli_query($conexion,"INSERT into usuarios (USUARIO,USUPASSWORD,USUID,USUNOMBRE,USUAPELLIDO,USUDIRECCION,USUTELEFONO,EMAIL,PERFIL)  values ('$usuario','$password','$id','$nombres','$apellidos','$direccion','$telefono','$email','uploads/$nombrei[0]')");

if($nombrei[0]=="") { 
    $consulta=mysqli_query($conexion,"UPDATE usuarios SET PERFIL='img/user.png' WHERE USUARIO='$usuario'");
}

if (!$consulta) {
	echo "<script>";
	echo "alert('No se registro es posible que ya este registrado su documento');";  
	echo "window.location = '../registrar.php';";
	echo "</script>";
}
else {
   
    foreach ($_FILES["imagenes"]["error"] as $clave => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $nombre_tmp = $_FILES["imagenes"]["tmp_name"][$clave];
            $nombre = basename($_FILES["imagenes"]["name"][$clave]);
            move_uploaded_file($nombre_tmp, "../uploads/$nombre");
        }
    }

echo "<script>";
echo "alert('Registrado Correctamente');";  
echo "window.location = '../login.php';";
echo "</script>";
}
?>
</body>
</HTML>
<?php

//echo 'editar.php?id=1&color=success&descripcion=este es un color verde';

$id = $_GET['id'];
$descripcion = $_GET['descripcion'];
$color = $_GET['color'];

//echo "<br>";
//echo $id;
//echo "<br>";
//echo $color;
//echo "<br>";
//echo $descripcion;

include_once 'conexion.php';

$sql_editar = 'UPDATE colores SET color=?, descripcion=? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($color,$descripcion,$id));

//cerramos la conexion a la bd
$pdo = null;
$sentencia_editar = null;

header('location:index.php');
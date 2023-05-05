<?php 
include('../conexion.php');
$conexion = conectar();
$id= $_GET['id'];
$sql="DELETE from alumno where alumno_id='".$id."'";
$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);

header('location:alumnos.php');
?>
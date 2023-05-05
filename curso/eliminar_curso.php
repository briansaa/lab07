<?php 
include('../conexion.php');
$conexion = conectar();
$id= $_GET['id'];
$sql="DELETE from curso where curso_id='".$id."'";
$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);

header('location:cursos.php');
?>
<?php
// Incluye el archivo de conexión a la base de datos
include('../conexion.php');

// Obtiene el id del curso a eliminar
$curso_id = $_GET['curso_id'];

// Forma la consulta SQL para eliminar el curso
$sql = "DELETE FROM curso WHERE curso_id = $curso_id";

// Ejecuta la consulta en la base de datos
$resultado = mysqli_query($conexion, $sql);

// Cierra la conexión a la base de datos
mysqli_close($conexion);

// Redirige al usuario a la página de cursos
header('Location: cursos.php');

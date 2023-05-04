<?php

include('../conexion.php');

// Abrimos la conexión a la BD MySQL
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT m.matricula_id, a.nombres, a.ape_paterno, a.ape_materno, c.nombre_curso FROM matricula m 
        INNER JOIN alumno a ON m.alumno_id = a.alumno_id 
        INNER JOIN curso c ON m.curso_id = c.curso_id';

// Ejecutamos el query en la conexión abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriculas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Matriculas</h1>
        <div>
            <a href="agregar_matricula.php" class="btn btn-primary">Nueva Matricula</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Recorremos el array con el resultado de la consulta
                    while($matricula = mysqli_fetch_array($resultado)) {
                        $matricula_id = $matricula['matricula_id'];
                        $alumno = $matricula['nombres'] . ' ' . $matricula['ape_paterno'] . ' ' . $matricula['ape_materno'];
                        $curso = $matricula['nombre_curso'];

                    echo '<tr>';
                    echo '<td>' . $matricula_id . '</td>';
                    echo '<td>' . $alumno . '</td>';
                    echo '<td>' . $curso . '</td>';
                    echo '<td><a href="editar_matricula.php?id='.$matricula_id.'" class="btn btn-info">Editar</a> <a href="eliminar_matricula.php?id='.$matricula_id.'" class="btn btn-danger">Eliminar</a></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

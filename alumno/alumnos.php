<?php

include('../conexion.php');

// Abrimos la conexión a la BD MySQL
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno';

// Ejecjutamos el query en la conexión abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Alumnos</h1>
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="agregar.html">Nuevo alumno</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Recorrer el array con el resultado de la consulta
                        while($alumno = mysqli_fetch_array($resultado)) {
                            $alumno_id = $alumno['alumno_id'];
                            $nombres = $alumno['nombres'];
                            $ape_paterno = $alumno['ape_paterno'];
                            $ape_materno = $alumno['ape_materno'];

                        echo '<tr>';
                        echo '<td>' . $alumno_id . '</td>';
                        echo '<td>' . $nombres . '</td>';
                        echo '<td>' . $ape_paterno . '</td>';
                        echo '<td>' . $ape_materno . '</td>';
                        echo '<td><a href="editar_alumno.php?id='. $alumno_id .'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="eliminar_alumno.php?id='. $alumno_id .'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
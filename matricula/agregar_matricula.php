<?php

include('../conexion.php');

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $alumno_id = $_POST['alumno_id'];
    $curso_id = $_POST['curso_id'];
    
    // Abrir la conexión a la base de datos
    $conexion = conectar();
    
    // Formar la consulta SQL para insertar los datos de la matricula
    $sql = "INSERT INTO matricula (alumno_id, curso_id) VALUES ('$alumno_id', '$curso_id')";
    
    // Ejecutar la consulta y verificar el resultado
    $resultado = mysqli_query($conexion, $sql);
    if (!$resultado) {
        echo 'No se ha podido agregar la matricula';
    }
    else {
        // Obtener el id de la matricula insertada
        $matricula_id = mysqli_insert_id($conexion);
        echo 'Matricula agregada';
        echo '<td><a href="matriculas.php?id='.$matricula_id.'" btn btn-primary my-3"><br><br>Regresar</a></td>';
    }
   

    // Cerrar la conexión
    desconectar($conexion);
}
else {
    // Abrir la conexión a la base de datos
    $conexion = conectar();
    
    // Formar la consulta SQL para obtener la lista de alumnos y cursos
    $sql_alumnos = "SELECT * FROM alumno";
    $sql_cursos = "SELECT * FROM curso";
    
    // Ejecutar las consultas y obtener los datos de los alumnos y cursos
    $resultado_alumnos = mysqli_query($conexion, $sql_alumnos);
    $resultado_cursos = mysqli_query($conexion, $sql_cursos);
    
    // Cerrar la conexión
    desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Matricula</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Matricula</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="alumno_id">Alumno:</label>
                <select name="alumno_id" class="form-control">
                    <?php
                        // Recorremos el array con los datos de los alumnos y creamos las opciones del select
                        while($alumno = mysqli_fetch_array($resultado_alumnos)) {
                            echo '<option value="' . $alumno['alumno_id'] . '">' . $alumno['nombres'] . ' ' . $alumno['ape_paterno'] . ' ' . $alumno['ape_materno'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="curso_id">Curso:</label>
                <select name="curso_id" class="form-control">
                    <?php
                        // Recorremos el array con los datos de los cursos y creamos las opciones del select
                        while($curso = mysqli_fetch_array($resultado_cursos)) {
                            echo '<option value="' . $curso['curso_id'] . '">' . $curso['nombre_curso'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Matricula</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}

                    ?>
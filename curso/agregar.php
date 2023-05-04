<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Matricula</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <form action="" method="POST">
            <div class="form-group">
                <label for="alumno_id">Alumno:</label>
                <select class="form-control" name="alumno_id">
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
                <select class="form-control" name="curso_id">
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

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

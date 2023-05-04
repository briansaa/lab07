<?php

include('../conexion.php');

// Verificar si se ha recibido el id de la matrícula
if(isset($_GET['id'])) {
    $matricula_id = intval($_GET['id']);

    // Verificar si se ha enviado el formulario de eliminación
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Abrir la conexión a la base de datos
        $conexion = conectar();

        // Formar la consulta SQL para eliminar la matrícula
        $sql = "DELETE FROM matricula WHERE matricula_id = $matricula_id";

        // Ejecutar la consulta y verificar el resultado
        $resultado = mysqli_query($conexion, $sql);
        if (!$resultado) {
            echo 'No se ha podido eliminar la matrícula';
        }
        else {
            echo 'Matrícula eliminada';
            echo '<td><a href="matriculas.php?id='.$matricula_id.'" btn btn-primary my-3"><br><br>Regresar</a></td>';
        }

        // Cerrar la conexión
        desconectar($conexion);
    } else {
        // Mostrar el formulario de confirmación de eliminación
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agregamos el link al archivo de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Eliminar Matrícula</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 bg-warning border-">¿Está seguro de que desea eliminar la matrícula?</h1>
        <form action="" method="POST">
            <div class="form-group">
                <input type="submit" class="btn btn-danger mt-5" value="Sí">
            </div>
        </form>
        <a href="matriculas.php" class="btn btn-primary mt-3">Cancelar</a>
    </div>
</body>
</html>
        <?php
    }
} else {
    echo 'No se ha recibido el id de la matrícula a eliminar';
}
?>

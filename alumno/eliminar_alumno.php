<?php

include('../conexion.php');

// Verificar si se ha recibido el id de la matrícula
if(isset($_GET['id'])) {
    $matricula_id = intval($_GET['id']);

    // Verificar si el usuario tiene los permisos necesarios
    session_start();
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel_permiso'] < 2) {
        echo 'No tiene permisos para eliminar matrículas';
        exit();
    }

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
            <title>Eliminar Matrícula</title>
        </head>
        <body>
            <h1>¿Está seguro de que desea eliminar la matrícula?</h1>
            <form action="" method="POST">
                <input type="submit" value="Sí">
            </form>
            <a href="matriculas.php">Cancelar</a>
        </body>
        </html>
        <?php
    }
} else {
    echo 'No se ha recibido el id de la matrícula a eliminar';
}
?>

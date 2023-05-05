<?php
include('../conexion.php');

// Verificar si se ha enviado un formulario de edición de curso
if (isset($_POST['guardar'])) {
    // Obtener la información del curso desde el formulario
    $curso_id = $_POST['curso_id'];
    $nombre_curso = $_POST['nombre_curso'];
    $creditos = $_POST['creditos'];

    // Conectar a la base de datos
    $conexion = conectar();

    // Formar la consulta SQL para actualizar los datos del curso
    $sql = "UPDATE curso SET nombre_curso='$nombre_curso', creditos='$creditos' WHERE curso_id=$curso_id";

    // Ejecutar la consulta SQL
    $resultado = mysqli_query($conexion, $sql);

    // Cerrar la conexión a la base de datos
    desconectar($conexion);

    // Redirigir a la página de listado de cursos
    header('Location: cursos.php');
    exit();
}

// Verificar si se ha recibido un ID de curso válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: cursos.php');
    exit();
}

// Conectar a la base de datos
$conexion = conectar();

// Obtener la información del curso a partir del ID recibido en la URL
$curso_id = $_GET['id'];
$sql = "SELECT * FROM curso WHERE curso_id=$curso_id";
$resultado = mysqli_query($conexion, $sql);
$curso = mysqli_fetch_assoc($resultado);

// Cerrar la conexión a la base de datos
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <!-- Agregar los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Editar Curso</h1>
        <form action="" method="post">
            <input type="hidden" name="curso_id" value="<?php echo $curso['curso_id']; ?>">
            <div class="form-group">
                <label for="nombre_curso">Nombre del curso:</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="<?php echo $curso['nombre_curso']; ?>">
            </div>


            
            <div class="form-group">
                <label for="creditos">Créditos:</label>
                <input type="number" class="form-control" id="creditos" name="creditos" value="<?php echo $curso['creditos']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar cambios</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
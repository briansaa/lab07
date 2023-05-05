<?php
include('../conexion.php');
$conexion = conectar();
$id = $_GET['id'];
$sql = "SELECT * from alumno where alumno_id='" . $id . "'";
$resultado = mysqli_query($conexion, $sql);
$alumno = mysqli_fetch_array($resultado);
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Editar Alumno</title>
</head>

<body>
    <div class="container ">
      
            <h1 class="text_center">Editar alumno</h1>
            <form  method="post" action="editar_registro.php">
                    <input type="hidden" name="alumno_id" value="<?php echo $alumno['alumno_id'] ?>">
                    <div class="form-group">
<label for="alumno_id"></label>
                            <input type="text" name="nombres" class="form-control"  value="<?php echo $alumno['nombres'] ?>" >
                    </div>
                    <div class="form-group">
                        <label for="ape_pterno">Apellido Paterno:</label>
                            <input type="text"class="form-control"  id="ape_paterno" name="ape_paterno" value="<?php echo $alumno['ape_paterno'] ?>" required></div>



                    <div class="form-group">
                        <label for="ape_materno">Apellido Materno:</label>
                            <input type="text"  class="form-control" name="ape_materno" value="<?php echo $alumno['ape_materno'] ?>"> </div>



                            <button class="btn btn-primary " name="guardar " type="submit">Actualizar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
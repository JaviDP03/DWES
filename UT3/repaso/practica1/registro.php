<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
    $relleno = !empty($_POST['dni']) && !empty($_POST['ciclo']) && !empty($_POST['provincias']);

    if (!$relleno) {
        echo "No se han rellenado todos los campos";
        exit();
    }
    
    try {
        $bd = new PDO('mysql:host=localhost;dbname=fpAndaluza', 'root', '');
    } catch (PDOException $p) {
        echo "Se ha lanzado la excepción " . $p->getMessage() . "<br/>";
        exit();
    }

    $dni = $_POST['dni'];
    $ciclo = $_POST['ciclo'];
    $provincias = $_POST['provincias'];
    $hora = date("Y-m-d H:i:s");

    try {
        $sentencia = $bd->prepare("INSERT INTO solicitudesPlaza VALUES (?, ?, ?, ?)");
        $sentencia->bindParam(1, $dni);
        $sentencia->bindParam(2, $ciclo);
        $sentencia->bindParam(4, $hora);

        for ($i = 0; $i < count($provincias); $i++) {
            $sentencia->bindParam(3, $provincias[$i]);
            $sentencia->execute();

            echo "<p>";
            echo "INSERT INTO solicitudesPlaza VALUES ('$dni', '$ciclo', '{$provincias[$i]}', '$hora')<br>";
            echo "Insertado correctamente";
            echo "</p>";
        }

        echo "Se han insertado $i registros";
    } catch (PDOException $p) {
        echo "Ha habido una excepción:<br>" . $p->getMessage();
    }
    ?>
    <p><a href="index.php"><-- Volver</a></p>
</body>

</html>
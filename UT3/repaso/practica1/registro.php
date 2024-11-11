<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
    try {
        $bd = new PDO('mysql:host=localhost;dbname=fpAndaluza', 'root', '');
    } catch (PDOException $p) {
        echo "Se ha lanzado la excepción " . $p->getMessage() . "<br/>";
        exit();
    }

    $dni = $_POST['dni'];
    $ciclo = $_POST['ciclo'];
    $provincias = $_POST['provincias'];
    $hora = date("Y-m-d h:i:s");

    try {
        for ($i=0; $i < count($provincias); $i++) { 
            $bd->exec("INSERT INTO solicitudesPlaza VALUES ('$dni', '$ciclo', '{$provincias[$i]}', '$hora')");
        }
    } catch (PDOException $p) {
        echo "Ha habido una excepción:<br>". $p->getMessage();
    }
    ?>
</body>

</html>
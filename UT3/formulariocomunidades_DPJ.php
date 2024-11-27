<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <?php
    if (!empty($_POST)) {
        echo "<h4>Datos enviados</h4>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }

    try {
        $bd = new PDO('mysql:host=localhost;dbname=geografia', 'root', '');
    } catch (PDOException $e) {
        echo "Se ha lanzado la excepción " . $e->getMessage() . "<br/>";
        exit();
    }

    $consulta = $bd->query("SELECT * FROM comunidades");
    ?>

    <h2>Formulario de comunidades</h2>
    <form method="POST">
        <p>Usuario: <input type="text" name="usuario" value="Javier"></p>
        <?php
        echo "Comunidad:<br>";
        while ($fila = $consulta->fetch()) {
            echo "<p><input type=\"radio\" name=\"comunidad\" value=\"{$fila['idComunidad']}\">&nbsp;{$fila['comunidad']}</p>";
        }
        ?>
        <p><input type="submit"></p>
    </form>
    <?php
    if (isset($_POST['comunidad']) && isset($_POST['usuario'])) {
        $usuario = $_POST['usuario'];
        $idComunidad = $_POST['comunidad'];
        $hora = date("Y-m-d H:i:s");

        $insercion = $bd->prepare("INSERT INTO logComunidades VALUES (:usuario, :idComunidad, :hora)");
        $insercion->bindParam(':usuario', $usuario);
        $insercion->bindParam(':idComunidad', $idComunidad);
        $insercion->bindParam(':hora', $hora);

        if ($insercion->execute()) {
            echo "<p>Se han introducido los datos correctamente</p>";
        } else {
            echo "<p>Ha ocurrido un error al insertar los datos</p>";
        }
    }
    ?>
</body>

</html>
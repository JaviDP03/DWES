<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.5</title>
</head>

<body>
    <h2>Datos de un producto</h2>
    <form>
        <p>Código: <input type="text" name="codigo"></p>
        <input type="submit" name="submit">
    </form>

    <?php
    $codigo = $_GET['codigo'];

    $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
    $resultado = $bd->query("SELECT * FROM producto WHERE cod = '$codigo'");
    while ($registro = $resultado->fetch()) {
        echo "<pre>";
        print_r($registro);
        echo "</pre>";
    }
    ?>
</body>

</html>
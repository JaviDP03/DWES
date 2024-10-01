<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.11</title>
</head>

<body>
    <h3>Original</h3>
    <?php
    $listaNumeros = array(4, 3, 87, 24, 50);
    unset($listaNumeros[2]);
    echo "<pre>";
    print_r($listaNumeros);
    echo "</pre>";
    ?>
    <br>
    <h3>Copia</h3>
    <pre>
    <?php
    print_r(array_values($listaNumeros));
    ?>
    </pre>
</body>

</html>
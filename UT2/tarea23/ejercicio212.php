<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.12</title>
</head>

<body>
    <?php
    $diccionario = array(
        "painting" => "cuadro",
        "glasses" => "gafas",
        "ship" => "nave",
        "skull" => "calavera",
        "screen" => "pantalla",
        "strawberry" => "fresa",
        "house" => "casa",
        "paper" => "papel",
        "fan" => "ventilador",
        "car" => "coche"
    );

    echo "Hay " . count($diccionario) . " palabras en el diccionario.<br>";

    if (in_array("pelota", $diccionario)) {
        echo "La palabra 'pelota' está en el diccionario.<br>";
    } else {
        echo "La palabra 'pelota' no está en el diccionario.<br>";
    }

    if (array_key_exists("car", $diccionario)) {
        echo "La palabra 'car' está en el diccionario.<br>";
    } else {
        echo "La palabra 'car' no está en el diccionario.<br>";
    }

    $traduccion = array_search("fresa", $diccionario);
    if ("traduccion" !== false) {
        echo "La palabra 'fresa' se traduce como '$traduccion'.<br>";
    } else {
        echo "La palabra 'fresa' no se encuentra en el diccionario.<br>";
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.6</title>
</head>
<body>
    <?php
    $hermanos = $_GET['hermanos'];

    function esFamiliaNumerosa($hermanos) {
        if ($hermanos >= 3) {
            return true;
        }
        return false;
    }

    echo esFamiliaNumerosa($hermanos) ? "True" : "False";
    ?>
</body>
</html>
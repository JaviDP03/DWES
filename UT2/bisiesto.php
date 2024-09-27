<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bisiesto</title>
</head>
<body>
    <?php
    $anno = $_REQUEST['anno'];

    echo "El año " . $anno;
    if ($anno % 4 == 0) {
        echo " es bisiesto.";
    } else {
        echo " no es bisiesto.";
    }
    ?>
</body>
</html>
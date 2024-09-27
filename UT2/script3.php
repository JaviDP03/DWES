<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo "Script " . 1 + 2;
        $nombre = "Javier";
        $apellido = "Duarte"
            ?>
    </title>
</head>

<body>
    <p>Mi nombre es: <?= "$nombre $apellido" ?></p>
    <p>Mi nombre es: <?= "$nombre" , "$apellido" ?></p>
    <p>Mi nombre es: <?= "$nombre" . "$apellido" ?></p>

    <?php 
    while ($a <= 10) {
        # code...
    }
    ?>
</body>

</html>
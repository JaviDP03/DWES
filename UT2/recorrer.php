<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    echo "<hr>";
    $numero1 = $_REQUEST['numero1'];
    $numero2 = $_REQUEST['numero2'];
    $suma = 0;
    ?>
    <p>
        Los números entre <?= $numero1 ?> y <?= $numero2 ?> son:<br>

        <?php
        for ($i=++$numero1; $i < $numero2; $i++) { 
            echo $i. " ";
            $suma += $i;
        }
        ?>
        <br>
        <p>La suma entre los números <?= --$numero1 ?> y <?= $numero2 ?> es: <?= $suma ?></p>
    </p>
</body>
</html>
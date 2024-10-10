<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a = 1;
    $b = 1.1;
    $c = 'a';
    $d = "palabra";
    $e = date("d-m-Y");
    $f = true;
    $g = array();
    $h = null;

    echo "<p>Tipo de $a = " . gettype($a) . "</p>";
    echo "<p>Tipo de $b = " . gettype($b) . "</p>";
    echo "<p>Tipo de $c = " . gettype($c) . "</p>";
    echo "<p>Tipo de $d = " . gettype($d) . "</p>";
    echo "<p>Tipo de $e = " . gettype($e) . "</p>";
    echo "<p>Tipo de $f = " . gettype($f) . "</p>";
    echo "<p>Tipo de \$g = " . gettype($g) . "</p>";
    echo "<p>Tipo de $h = " . gettype($h) . "</p>";
    ?>
</body>
</html>
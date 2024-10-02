<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.10</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <p>Total: <?= count($_SERVER) ?></p>
    <table>
    <?php
    foreach ($_SERVER as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    ?>
    </table>
</body>
</html>
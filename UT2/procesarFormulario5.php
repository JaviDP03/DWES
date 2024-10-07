<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
        <?php
        if (!isset($_GET['submit'])) {
            echo "<p>Acceso no permitido</p>";
            echo "<p><a href=\"formulario5.html\">Volver</a></p>";
        } else {
            print_r($_GET);
        }
        ?>
    </pre>
</body>

</html>
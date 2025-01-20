<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Restringida</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['login'])) {
        header("Location: login.php");
    }
    ?>
    <h1>Zona Restringida</h1>
    <p>Bienvenido, <?= $_COOKIE['login']; ?></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>

</html>
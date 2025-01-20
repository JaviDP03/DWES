<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cierre sesión</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE["login"])) {
        header("Location: login.php");
    } else {
        setcookie("login", time() - 3600);
    }
    ?>
    <h4>Se ha cerrado la sesión correctamente</h4>
    <p><a href="login.php">Iniciar sesión</a></p>
</body>

</html>
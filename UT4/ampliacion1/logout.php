<!DOCTYPE html>
<?php
if (!isset($_COOKIE["user"])) {
    header("Location: login.php");
} else {
    setcookie("user");
    setcookie("rol");
}
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cierre sesión</title>
</head>

<body>
    <h4>Se ha cerrado la sesión correctamente</h4>
    <p><a href="login.php">Iniciar sesión</a></p>
</body>

</html>
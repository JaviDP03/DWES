<!DOCTYPE html>
<?php
if (isset($_COOKIE['login'])) {
    header("Location: zona_restringida.php");
}

try {
$bd = new PDO('mysql:host=localhost;dbname=zonaR', 'root', '');
} catch(PDOException $p) {
    echo "<p>Se ha lanzado la excepción " . $p->getMessage(). "</p>";
    exit();
}

if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $loginincorrecto = true;

    $consulta = $bd->prepare("SELECT * FROM usuarios WHERE user = :user");
    $consulta->execute(['user' => $user]);

    while ($fila = $consulta->fetch()) {
        $userBD = $fila['user'];
        $passwordBD = $fila['password'];

        if ($user == $userBD && password_verify($password, $passwordBD)) {
            $loginincorrecto = false;
            setcookie("login", $user, time() + 3600);
            header("Location: zona_restringida.php");
        }
    }
}
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Inicio de sesión</h1>
    <form method="post">
        <p>
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user">
        </p>
        <p>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </p>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php
    if (isset($loginincorrecto) && $loginincorrecto) {
        echo "<p>Usuario o contraseña incorrectos</p>";
    }
    ?>
</body>

</html>
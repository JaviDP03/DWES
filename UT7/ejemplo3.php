<?php
//ejemplo3.php
$bd = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8', 'dwes', 'abc123');

if (isset($_GET['q'])) {
    $consulta = $bd->prepare("SELECT id FROM users WHERE lower(email) = lower(:email)");
    $consulta->execute(['email' => $_GET['q']]);
    if ($usuario = $consulta->fetch()) {
        echo "El correo ya existe";
    } else {
        echo "OK";
    }
} else {
    echo "";
}

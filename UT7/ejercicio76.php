<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$q = $_GET["q"];
$bd = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8', 'dwes', 'abc123');
$consulta = $bd->prepare("SELECT nombre, apellido, edad, ciudad, trabajo FROM familyguy WHERE id = :id");
$consulta->execute(['id' => $_GET['q']]);
if ($persona = $consulta->fetch()) {
    echo json_encode($persona);
}

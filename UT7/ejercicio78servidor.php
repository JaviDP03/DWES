<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$q = $_GET["q"];
$bd = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'dwes', 'abc123');
$consulta = $bd->prepare("SELECT nombre_corto, descripcion, PVP FROM producto WHERE cod = :cod");
$consulta->execute(['cod' => $_GET['q']]);
if ($producto = $consulta->fetch()) {
    echo json_encode($producto);
}

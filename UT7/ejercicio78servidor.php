<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$q = $_GET["q"];
$bd = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'dwes', 'abc123');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>
<producto>';
$consulta = $bd->prepare("SELECT nombre_corto, descripcion, PVP FROM producto WHERE cod = :cod");
$consulta->execute(['cod' => $_GET['q']]);
if ($producto = $consulta->fetch()) {
    echo "<nombre>" . $producto['nombre_corto'] . "</nombre>";
    echo "<descripcion>" . $producto['descripcion'] . "</descripcion>";
    echo "<precio>" . $producto['PVP'] . "</precio>";
}
echo "</producto>";

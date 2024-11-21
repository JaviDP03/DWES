<?php
// ejemplo4servidor.php
header('Content-Type: text/xml'); // Esta línea indica que la respuesta es XML
header("Cache-Control: no-cache, must-revalidate"); // Esta línea ayuda a que la respuesta no se incluya en caché
// Fecha caducada
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Esta línea ayuda a que la respuesta no se incluya en caché

$q=$_GET["q"];
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

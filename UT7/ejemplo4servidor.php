<?php
// ejemplo4servidor.php
header('Content-Type: text/xml'); // Esta línea indica que la respuesta es XML
header("Cache-Control: no-cache, must-revalidate"); // Esta línea ayuda a que la respuesta no se incluya en caché
// Fecha caducada
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Esta línea ayuda a que la respuesta no se incluya en caché

$q=$_GET["q"];
$bd = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8', 'dwes', 'abc123');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>
<persona>';
$consulta = $bd->prepare("SELECT nombre, apellido, edad, ciudad, trabajo FROM familyguy WHERE id = :id");
$consulta->execute(['id' => $_GET['q']]);
if ($persona = $consulta->fetch()) {
    echo "<nombre>" . $persona['nombre'] . "</nombre>";
    echo "<apellido>" . $persona['apellido'] . "</apellido>";
    echo "<edad>" . $persona['edad'] . "</edad>";
    echo "<ciudad>" . $persona['ciudad'] . "</ciudad>";
    echo "<trabajo>" . $persona['trabajo'] . "</trabajo>";
}
echo "</persona>";

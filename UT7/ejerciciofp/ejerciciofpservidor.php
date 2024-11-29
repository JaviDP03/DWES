<?php
header('Content-Type: text/html');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$q = $_GET['q'];
$bd = new PDO('mysql:host=localhost;dbname=fpandaluza;charset=utf8', 'dwes', 'abc123');
$consulta = $bd->prepare("SELECT nombreModulo, numeroHorasSemanales FROM modulos WHERE codigoModulo = :codigoModulo");
$consulta->execute(['codigoModulo' => $q]);
if ($modulo = $consulta->fetch()) {
    echo "<p>Horas: {$modulo['numeroHorasSemanales']}</p>";
}
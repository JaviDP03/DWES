<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$q = $_GET['q'];
$bd = new PDO('mysql:host=localhost;dbname=fpandaluza;charset=utf8', 'dwes', 'abc123');
echo '<?xml version="1.0" encoding="UTF-8"?>
<modulo>';
$consulta = $bd->prepare("SELECT numeroHorasSemanales FROM modulos WHERE codigoModulo = :codigoModulo");
$consulta->execute(['codigoModulo' => $q]);
if ($modulo = $consulta->fetch()) {
    echo "<horas>{$modulo['numeroHorasSemanales']}</horas>";
}
echo "</modulo>";

<?php
$bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");

$consulta = $bd->prepare("SELECT nombre FROM familia WHERE cod = :cod");
$consulta->execute(['cod' => "TABLET"]);
while ($registro = $consulta->fetch()) {
    echo "Nombre de la familia: " . $registro['nombre'] . "<br />";
}

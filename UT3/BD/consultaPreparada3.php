<?php
$bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");

$codigo = "CONSOL";
$consulta = $bd->prepare("SELECT nombre FROM familia WHERE cod = :cod");
$consulta->bindParam(':cod', $codigo);
$consulta->execute();
$consulta->bindColumn(1, $nombre);
while ($consulta->fetch(PDO::FETCH_BOUND)) {
    echo "Nombre de la familia: " . $nombre . "<br />";
}

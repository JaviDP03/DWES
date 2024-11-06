<?php
$bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");

$consulta = $bd->prepare('INSERT INTO familia (cod, nombre) VALUES (?, ?)');
$parametros = array("TABLET", "Tablet PC");
$consulta->execute($parametros);
// Si usamos parámetros con nombre
$consulta = $bd->prepare('INSERT INTO familia (cod, nombre) VALUES
(:cod, :nombre)');
$parametros = array(":cod" => "TABLET", ":nombre" => "Tablet PC");
$consulta->execute($parametros);

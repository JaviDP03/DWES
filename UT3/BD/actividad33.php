<?php
$bd = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');

$ok = true;
$bd->beginTransaction();
if (!$registros = $bd->exec("UPDATE stock SET unidades = unidades-1 WHERE producto = '3DSNG' AND tienda = 1")) {
    $ok = false;
}
echo "<p>Se han actualizado $registros registro/s de la tienda 1</p>";

if (!$registros = $bd->exec("UPDATE stock SET unidades = unidades+1 WHERE producto = '3DSNG' AND tienda = 3")) {
    $ok = false;
}
echo "<p>Se han actualizado $registros registro/s de la tienda 3</p>";

if ($ok) {
    $bd->commit(); // Si todo fue bien confirma los cambios
    echo "<p>Un producto 3DSNG se ha movido de tienda 1 a tienda 3</p>";
} else {
    $bd->rollback(); // y si no, los revierte
    echo "<p>Rollback ejecutado</p>";
}

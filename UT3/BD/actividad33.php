<?php
if ($bd = new PDO('mysql:host=localhost;dbname=tienda', 'root', '')) {
    echo "Conexión con éxito";
} else {
    echo "Fallo en la conexión";
}

$actualizar = $bd->exec("UPDATE stock SET unidades = unidades-1 WHERE producto = '3DSNG' AND tienda = 1");
echo "<p>Se han actualizado $actualizar registros.</p>";

$insertar = $bd->exec("INSERT INTO stock VALUES ('3DSNG', 3, 1)");
echo "<p>Se ha insertado $insertar registro.</p>";
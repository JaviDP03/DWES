<?php
if ($bd = new PDO('mysql:host=localhost;dbname=tienda', 'root', '')) {
    echo "Conexión con éxito";
} else {
    echo "Fallo en la conexión";
}

$version = $bd->getAttribute(PDO::ATTR_SERVER_VERSION);
echo "<p>Versión: $version</p>";

$mayusculas = $bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
echo "<p>Mayúsculas: $mayusculas</p>";

$registros = $bd->exec('DELETE FROM stock WHERE unidades=1');
echo "<p>Se han borrado $registros registros.</p>";

$resultado = $bd->query('SELECT producto, unidades FROM stock');
echo "<pre>";
print_r($resultado);
echo "</pre>";
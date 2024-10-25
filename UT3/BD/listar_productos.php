<?php
$bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
$resultado = $bd->query("SELECT producto, unidades FROM stock");
while ($registro = $resultado->fetch()) {
    echo "Producto " . $registro['producto'] . ": " .
        $registro['unidades'] . " unidades<br>";
}

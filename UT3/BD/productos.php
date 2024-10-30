<?php
$bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
$resultado = $bd->query("SELECT producto, unidades FROM stock");
while ($registro = $resultado->fetch(PDO::FETCH_BOTH)) {
    echo "Producto " . $registro[0] . ": " .
        $registro[1] . " unidades<br>";
}

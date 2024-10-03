<?php
$precio = 10;
$precioIva = precioConIva(10);
echo "<p>El precio con IVA es " . $precioIva. "</p>";

$precio2 = 23;
$precioIva = precioConIva(23);
echo "<p> El precio con IVA es ". $precioIva. "</p>";

function precioConIva($pPrecio)
{
    return $pPrecio * 1.21;
}
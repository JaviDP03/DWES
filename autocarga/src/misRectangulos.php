<?php

namespace DWES;
require_once "../vendor/autoload.php";

$miRectangulo = new Rectangulo();
$miRectangulo2 = new Rectangulo();

$miRectangulo->setBase(5);
$miRectangulo->setAltura(7);
$miRectangulo2->setBase(3);
$miRectangulo2->setAltura(9);

?>

<h3>Rectángulo 1</h3>
<ul>
    <li>Base: <?= $miRectangulo->getBase() ?></li>
    <li>Altura: <?= $miRectangulo->getAltura() ?></li>
    <li>Área: <?= $miRectangulo->calcularArea() ?></li>
</ul>
<h3>Rectángulo 2</h3>
<ul>
    <li>Base: <?= $miRectangulo2->getBase() ?></li>
    <li>Altura: <?= $miRectangulo2->getAltura() ?></li>
    <li>Área: <?= $miRectangulo2->calcularArea() ?></li>
</ul>
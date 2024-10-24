<?php

namespace DWES;
require_once "../vendor/autoload.php";

$miCaja = new Caja();

$miCaja->introduce("algo");
$miCaja->muestraContenido();

echo $miCaja->__toString();
<?php

// $numero1 = isset($_REQUEST['numero1']) ? $_REQUEST['numero1'] : 0;
$numero1 = intval($_REQUEST['numero1'] ?? 0);

// $numero2 = isset($_REQUEST['numero2']) ? $_REQUEST['numero2'] : 0;
$numero2 = intval($_REQUEST['numero2'] ?? 0);

$suma = $numero1 + $numero2;

echo $suma;

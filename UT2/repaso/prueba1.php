<?php
$numero = 2;
echo 'Una variable se representa de la forma \$numero<br>';
echo "Una variable se representa de la forma \$numero<br>";

echo date("d-m-Y h:i:s") . "<br>";

function duplicar(string $numero) {
    return $numero*2;
}

$tipos = array("A" => '1', "B" => '2', "C" => '3');

echo "Tipo = {$tipos['A']}<br>";
echo "La variable \$numero tiene valor $numero";
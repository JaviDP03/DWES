<?php
$comando = "sudo mysql -u root < tienda.sql";

$ultimaLinea = system($comando, $retornoCompleto);

echo "Importación realizada";
<?php
setcookie("ultima_visita", date("d-m-Y H:i:s"), time() + 31536000);

if (!isset($_COOKIE["ultima_visita"])) {
    echo "Bienvenido";
} else {
    echo "<p>La hora actual es: " . date("d-m-Y H:i:s");
    echo "<p>Tu última visita fue: " . $_COOKIE["ultima_visita"];
}

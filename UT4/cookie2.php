<?php
// Crear cookie
echo "<p>La hora actual es: " . date("d-m-Y H:i:s");
setcookie("x", date("d-m-Y H:i:s"), time() + 3600);

// Mostrar cookie
if (isset($_COOKIE["x"])) {
    echo "<p>Tu última visita fue: " . $_COOKIE["x"];
}

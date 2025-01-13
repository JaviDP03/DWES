<?php
echo "Se va a crear la cookie \"ultimaIP\".";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

setcookie("ultimaIP", $_SERVER['REMOTE_ADDR'], time() + 3600);

<?php
// CONECTAR CON LA BBDD USANDO "root"/""
// SI HAY ERRORES, SALIR
// USAR UTF-8
try {
    $bd = new PDO('mysql:host=localhost;dbname=hackblog;charset=utf8', 'root', '');
} catch(PDOException $p) {
    echo "Se ha lanzado la excepción " . $p->getMessage(). "<br/>";
    exit();
}

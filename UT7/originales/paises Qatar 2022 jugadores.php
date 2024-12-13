<?php
$bd = new PDO('mysql:host=localhost;dbname=qatar2022;charset=utf8', 'root', '');
$p = $_POST['pais'];
$consulta = $bd->query("SELECT jugador FROM jugadores WHERE pais='$p'");

if (!$jugador = $jugador = $consulta->fetch()) {
    echo "<p>No hay jugadores</p>";
} else {
    echo "<ol>";
    echo "<li>{$jugador['jugador']}</li>\n";
}

while ($jugador = $consulta->fetch()) {
    echo "<li>{$jugador['jugador']}</li>\n";
}
echo "</ol>";

<pre>
<?php
$comando = 'mysql -u root < tienda.sql';
// $comando = "ls";  //Descomentar para probar el valor asignado a $ultima_linea
$ultima_linea = system($comando, $valorRetorno);
if (!$valorRetorno) {
    echo "<p>Comando <b>$comando</b> ejecutado con éxito</p>";
    echo $ultima_linea ? "<p>Última línea generada = $ultima_linea</p>" : "";
} else {
    echo "<p>No ha sido posible ejecutar el comando <b>$comando</b></p>";
}
?>

<hr>
Hora: <?= date("H:i:s") ?>
</pre>
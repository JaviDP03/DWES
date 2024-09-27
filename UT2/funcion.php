<?php
function prueba() {
    // Dentro de la función no se tiene acceso a la variable anterior
    static $a = 0;
    $b = $a++;
    echo "<p>\$b vale $b</p>";
}

#----------------------------------

$a = 1;
echo "<p>\$a vale $a</p>";

// Por tanto, la variable $a usada en la asignación anterior es una variable nueva
// que no tiene valor asignado (su valor es null)
prueba();
echo "<p>\$a vale $a</p>";
prueba();
prueba();
prueba();
prueba();
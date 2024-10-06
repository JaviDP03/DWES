<?php
$nombre = "Formulario devolución de libro";
$formulario = array(
    // Etiqueta, name, type, placeholder/value, grupo
    array("Usuario", "usuario", "text", "Introduce el usuario", "no"),
    array("Contraseña", "passwd", "password", "Introduce la contraseña", "no"),
    array("Nuevo", "estado", "radio", "nuevo", "Estado del libro"),
    array("Seminuevo", "estado", "radio", "seminuevo", "Estado del libro"),
    array("Usado", "estado", "radio", "usado", "Estado del libro"),
    array("Fantasía", "genero[]", "checkbox", "fantasia", "Género"),
    array("Terror", "genero[]", "checkbox", "terror", "Género"),
    array("Comedia", "genero[]", "checkbox", "comedia", "Género"),
    array("Novela", "genero[]", "checkbox", "novela", "Género"),
    array("Teatro", "genero[]", "checkbox", "teatro", "Género"),
    array("Romance", "genero[]", "checkbox", "romance", "Género"),
    array("Drama", "genero[]", "checkbox", "drama", "Género"),
    // Etiqueta, name, type, options, grupo, placeholder, multiple
    array("Duración del préstamo", "duracion", "select",
        array("2dias" => "2 días", "4dias" => "4 días", "6dias" => "6 días", "1semana" => "1 semana", "2semana" => "2 semanas", "3semana" => "3 semanas"),
    "no", "Elige una opción", "simple"),
    array("Biblioteca de devolución", "biblioteca[]", "select",
        array("lapiedra" => "Biblioteca La Piedra", "elrincondellector" => "Biblioteca El Rincón del Lector", "garcialorca" => "Biblioteca Federico García Lorca", "ecija" => "Biblioteca Municipal Écija"),
    "no", "Elige una opción", "multiple"),
);

echo "<h1>" . $nombre . "</h1>";
echo "<form action=\"https://www.iesluisvelez.org/ver_REQUEST.php\">";
for ($i = 0; $i < count($formulario); $i++) {
    // Radio o Checkbox
    if ($formulario[$i][2] == "radio" || $formulario[$i][2] == "checkbox") {
        if ($i == 0 || $formulario[$i][4] != $formulario[$i - 1][4]) {
            echo "<p>" . $formulario[$i][4] . ":<br>";
        }
        echo "<input type=\"" . $formulario[$i][2] . "\" name=\"" . $formulario[$i][1] . "\" value=\"" . $formulario[$i][3] . "\">" . $formulario[$i][0] . "&nbsp;";
    // Select
    } else if ($formulario[$i][2] == "select") {
        echo "<p>" . $formulario[$i][0] . ": <br>";
        echo "<select name=\"" . $formulario[$i][1] . "\"". $formulario[$i][6] . ">";
        echo "<option value=\"0\" selected disabled hidden>" . $formulario[$i][5] . "</option>";
        foreach ($formulario[$i][3] as $option => $value) {
            echo "<option value=\"" . $option . "\">" . $value . "</option>";
        }
        echo "</select></p>";
    // Resto de inputs
    } else {
        if ($i != 0 && ($formulario[$i - 1][2] == "radio" || $formulario[$i - 1][2] == "checkbox")) {
            echo "</p>";
        }
        echo "<p>" . $formulario[$i][0] . ": ";
        echo "<input type=\"" . $formulario[$i][2] . "\" name=\"" . $formulario[$i][1] . "\" placeholder=\"" . $formulario[$i][3] . "\"></p>";
    }
}
echo "<p><input type=\"submit\" value=\"Enviar\"><p>";
echo "</form>";

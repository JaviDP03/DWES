<?php
$formulario = array(
    // Etiqueta, name, type, placeholder/value
    array("Usuario", "usuario", "text", "Introduce el usuario"),
    array("Contraseña", "passwd", "password", "Introduce la contraseña"),
    array("Nuevo", "estado", "radio", "nuevo"),
    array("Seminuevo", "estado", "radio", "seminuevo"),
    array("Usado", "estado", "radio", "usado"),
    array("Fantasía", "categoria", "checkbox", "fantasia")
);

echo "<form action=\"https://www.iesluisvelez.org/ver_REQUEST.php\">";
for ($i = 0; $i < count($formulario); $i++) {

    if ($formulario[$i][2] == "radio" || $formulario[$i][2] == "checkbox") {
        echo "<input type=\"" . $formulario[$i][2] . "\" name=\"" . $formulario[$i][1] . "\" value=\"" . $formulario[$i][3] . "\">" . $formulario[$i][0] . "&nbsp;";
    } else {
        echo $formulario[$i][0] . ": ";
        echo "<input type=\"" . $formulario[$i][2] . "\" name=\"" . $formulario[$i][1] . "\" placeholder=\"" . $formulario[$i][3] . "\"></p>";
    }
}
echo "<input type=\"submit\" value=\"Enviar\">";
echo "</form>";

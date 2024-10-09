<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario comprobado</title>
</head>

<body>
    <h2>Formulario devolución de libro</h2>
    <?php
    function imprimirFormulario()
    {
        echo "
        <form action=\"https://iesluisvelez.org/ver_REQUEST.php\ method=\"POST\">
        <fieldset>
            <legend>Datos</legend>
            <p>
                <label for=\"usuario\">Usuario:</label>
                <input type=\"text\" name=\"usuario\">
            </p>
            <p>
                <label for=\"passwd\">Contraseña:</label>
                <input type=\"password\" name=\"passwd\">
            </p>
            <label for=\"estado\">Estado del libro:</label><br>
            <input type=\"radio\" name=\"estado\" value=\"nuevo\">
            <label>Nuevo</label>
            <input type=\"radio\" name=\"estado\" value=\"seminuevo\">
            <label>Seminuevo</label>
            <input type=\"radio\" name=\"estado\" value=\"usado\">
            <label>Usado</label>
            <input type=\"hidden\" name=\"oculto\" value=\"1\">
            <p>
                Género<br>
                <input type=\"checkbox\" name=\"genero[]\" value=\"fantasia\">
                <label>Fantasía</label>
                <input type=\"checkbox\" name=\"genero[]\" value=\"terror\">
                <label>Terror</label>
                <input type=\"checkbox\" name=\"genero[]\" value=\"comedia\">
                <label>Comedia</label>
                <input type=\"checkbox\" name=\"genero[]\" value=\"novela\">
                <label>Novela</label>
                <input type=\"checkbox\" name=\"genero[]\" value=\"teatro\">
                <label>Teatro</label>
                <input type=\"checkbox\" name=\"genero[]\" value=\"romance\">
                <label>Romance</label>
                <input type=\"checkbox\" name=\"genero[]\" value=\"drama\">
                <label>Drama</label>
            </p>
            <p>
                <label for=\"duracion\">Duración del préstamo:</label><br>
                <select name=\"duracion\">
                    <optgroup label=\"Días\">
                        <option value=\"2dias\">2 días</option>
                        <option value=\"4dias\">4 días</option>
                        <option value=\"6dias\">6 días</option>
                    </optgroup>
                    <optgroup label=\"Semanas\">
                        <option value=\"1semana\">1 semana</option>
                        <option value=\"2semana\">2 semanas</option>
                        <option value=\"3semana\">3 semanas</option>
                    </optgroup>
                </select>
            </p>
            <p>
                <label for=\"biblioteca\">Seleccione las bibliotecas a las que puede devolver el libro:</label><br>
                <select name=\"biblioteca[]\" multiple>
                    <option value=\"lapiedra\">Biblioteca La Piedra</option>
                    <option value=\"rincondellector\">Biblioteca El Rincón del Lector</option>
                    <option value=\"garcialorca\">Biblioteca Federico García Lorca</option>
                    <option value=\"ecija\">Biblioteca Municipal Écija</option>
                </select>
            </p>
            <p>
                <label for=\"extra\">Observaciones:</label><br>
                <textarea name=\"extra\" rows=\"10\" cols=\"50\"></textarea>
            </p>
        </fieldset>
        <br>
        <button type=\"submit\" value=\"Enviar\">Enviar</button>
    </form>";
    }
    imprimirFormulario();
    ?>
</body>

</html>
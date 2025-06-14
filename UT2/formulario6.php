<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario comprobado</title>
</head>

<body>
    <h2>Formulario devolución de libro</h2>
    <form method="POST">
        <fieldset>
            <legend>Datos</legend>
            <p>
                Usuario:
                <input type="text" name="usuario">
            </p>
            <p>
                Contraseña:
                <input type="password" name="passwd">
            </p>
            Estado del libro:<br>
            <input type="radio" name="estado" value="nuevo">
            Nuevo
            <input type="radio" name="estado" value="seminuevo">
            Seminuevo
            <input type="radio" name="estado" value="usado">
            Usado
            <input type="hidden" name="oculto" value="1">
            <p>
                Género<br>
                <input type="checkbox" name="genero[]" value="fantasia">
                <label>Fantasía</label>
                <input type="checkbox" name="genero[]" value="terror">
                <label>Terror</label>
                <input type="checkbox" name="genero[]" value="comedia">
                <label>Comedia</label>
                <input type="checkbox" name="genero[]" value="novela">
                <label>Novela</label>
                <input type="checkbox" name="genero[]" value="teatro">
                <label>Teatro</label>
                <input type="checkbox" name="genero[]" value="romance">
                <label>Romance</label>
                <input type="checkbox" name="genero[]" value="drama">
                <label>Drama</label>
            </p>
            <p>
                <label for="duracion">Duración del préstamo:</label><br>
                <select name="duracion">
                    <option value="" default>Introduce un valor</option>
                    <optgroup label="Días">
                        <option value="2dias">2 días</option>
                        <option value="4dias">4 días</option>
                        <option value="6dias">6 días</option>
                    </optgroup>
                    <optgroup label="Semanas">
                        <option value="1semana">1 semana</option>
                        <option value="2semana">2 semanas</option>
                        <option value="3semana">3 semanas</option>
                    </optgroup>
                </select>
            </p>
            <p>
                Seleccione las bibliotecas a las que puede devolver el libro:<br>
                <select name="biblioteca[]" multiple>
                    <option value="lapiedra">Biblioteca La Piedra</option>
                    <option value="rincondellector">Biblioteca El Rincón del Lector</option>
                    <option value="garcialorca">Biblioteca Federico García Lorca</option>
                    <option value="ecija">Biblioteca Municipal Écija</option>
                </select>
            </p>
            <p>
                Observaciones:<br>
                <textarea name="extra" rows="10" cols="50"></textarea>
            </p>
        </fieldset>
        <br>
        <button type="submit" value="Enviar">Enviar</button>
    </form>
    <?php
    $estaCompleto = true;
    foreach ($_REQUEST as $campo) {
        if (empty($campo)) {
            $estaCompleto = false;
            break;
        }
    }

    if ($estaCompleto) {
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
    }
    ?>
</body>

</html>
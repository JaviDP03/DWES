<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de correo</title>
</head>

<body>
    <h2>Formulario de correo</h2>
    <form method="POST">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </p>
        <p>
            <label for="tipomensaje">Tipo de mensaje:</label>
            <select id="tipomensaje" name="tipomensaje">
                <option value="consulta">Consulta</option>
                <option value="sugerencia">Sugerencia</option>
                <option value="queja">Queja</option>
            </select>
        </p>
        <p>
            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" cols="30" rows="5"></textarea>
        </p>
        <p><input type="submit" name="submit"></p>
    </form>
    <?php
    
    ?>
</body>

</html>
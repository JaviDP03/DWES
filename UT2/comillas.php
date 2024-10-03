<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        <input type="text"
            <?php
            # Generar el value a partir de una variable
            $valor = "1234";
            echo "value=\"$valor\"";
            ?>>
        <input type="text" value="<?= "clave-{$_REQUEST['clave']}" ?>">
    </form>
</body>

</html>
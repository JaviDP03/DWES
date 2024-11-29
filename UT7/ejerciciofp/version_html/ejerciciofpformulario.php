<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Versión HTML</title>
    <script src="ejerciciofp.js"></script>
    <?php
    $bd = new PDO('mysql:host=localhost;dbname=fpandaluza;charset=utf8', 'dwes', 'abc123');
    ?>
</head>

<body>
    <form>
        <label for="modulo">Seleccione un módulo:</label>
        <select id="modulo" name="modulo" onchange="mostrarHoras(this.value)">
            <option value="">Seleccione...</option>
            <?php
            $resultado = $bd->query('SELECT codigoModulo, nombreModulo FROM modulos');

            while ($fila = $resultado->fetch()) {
                echo "<option value=\"{$fila['codigoModulo']}\">{$fila['nombreModulo']}</option>";
            }
            ?>
        </select>
    </form>
    <div id="contHoras"></div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario de matriculación</title>
</head>

<body>
    <?php if (isset($_POST['enviar'])) { ?>
        <p>Nombre del alumno: <?php echo $_POST['nombre']; ?></p>
        <p>Módulos:</p>
        <ul>
            <?php
            foreach ($_POST['modulos'] as $modulo) {
                echo "<li>" . $modulo . "</li>";
            }
            ?>
        </ul>
        <p>Fecha: <?php echo $_POST['timestamp']; ?></p>
    <?php } else { ?>
        <form action="matricula.php" method="post">
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre"><br />
            <p>Módulos que cursa:</p>
            <label><input type="checkbox" name="modulos[]" value="DWES" />DWES</label><br />
            <label><input type="checkbox" name="modulos[]" value="DWEC" />DWEC</label><br />
            <label><input type="checkbox" name="modulos[]" value="DIW" />DIW</label><br />
            <label><input type="checkbox" name="modulos[]" value="DAW" />DAW</label><br />
            <label><input type="checkbox" name="modulos[]" value="EIE" />EIE</label><br />
            <br />
            <input type="submit" value="Enviar" name="enviar" />
            <input type="hidden" name="timestamp" value="<?php echo date('d/m/Y h:i:s'); ?>" />
        </form>
    <?php } ?>
</body>

</html>
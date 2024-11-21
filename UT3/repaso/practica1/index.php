<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
</head>

<body>
    <?php
    try {
        $bd = new PDO('mysql:host=localhost;dbname=fpAndaluza', 'root', '');
    } catch (PDOException $p) {
        echo "Se ha lanzado la excepción " . $p->getMessage() . "<br/>";
        exit();
    }

    $ciclos = $bd->query("SELECT * FROM ciclos");
    $provincias = $bd->query("SELECT * FROM provincias");
    ?>
    <h2>Solicitud de plaza</h2>
    <form action="registro.php" method="POST">
        <fieldset>
            <legend>Datos para el registro</legend>
            <p>
                <label for="dni">DNI: </label>
                <input type="text" id="dni" name="dni" value="51162580T">
            </p>
            <p>
                Ciclo:<br>
                <select name="ciclo" size="5">
                    <?php
                    for ($i = 0; $i < $ciclos->rowCount(); $i++) {
                        $ciclo = $ciclos->fetch();
                        $selected = $ciclo['codCiclo'] == 'DAW' ? "selected=\"selected\"" : "";
                        echo "<option value=\"{$ciclo['codCiclo']}\" $selected>{$ciclo['nomCiclo']}</option>\n";
                    }
                    ?>
                </select>
            </p>
            <p>
                Provincias:<br>
                <?php
                for ($i = 0; $i < $provincias->rowCount(); $i++) {
                    $provincia = $provincias->fetch();
                    echo "<input type=\"checkbox\" name=\"provincias[]\" value=\"{$provincia['codProvincia']}\"> {$provincia['nomProvincia']}&emsp;";
                }
                ?>
            </p>
        </fieldset>
        <br>
        <input type="submit">
    </form>
</body>

</html>
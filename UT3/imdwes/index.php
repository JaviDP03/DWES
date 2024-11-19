<html>

<head>
    <title>Piratas de Silicon Valley (1999) - IMDwes</title>
    <link rel="stylesheet" href="estilo.css">
    <?php require_once "funciones.php"; ?>
</head>

<body>
    <?php
    // Conexión a la base de datos
    try {
        $bd = conexionBD();
    } catch (PDOException $e) {
        echo "<p style=\"color: red\">Error: " . $e->getMessage() . "</p>";
        exit();
    }
    ?>
    <div id="wrapper">
        <div class="header"><span class="logo">IMDwes</span></div>
        <div class="superior">
            <h1>Piratas de Silicon Valley (1999)</h1>
            <p>1h 35min | Biografía, Drama, Historia | 20 Junio 1999</p>
        </div>
        <div class="inferior">
            <img class="poster" src="img/poster.jpg" />
            <p><strong>Sinopsis</strong>: Los logros de los visionarios Steve Jobs y
                Bill Gates revolucionan el siglo XX, e inician el camino que lleva al estado actual
                del mundo de la computación y la informática.</p>
            <h2>Opiniones</h2>
            <?php
            // Si se ha enviado el formulario, se inserta la opinión en la base de datos y se redirige a la misma página para limpiar el formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                insertarOpinion($bd);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }

            // Imprimir los datos
            $opiniones = consultarOpiniones($bd);
            if (!$opiniones) {
                echo "<p>Sin opiniones</p>";
            } else {
            ?>
                <ul class="opiniones">
                    <?php
                    for ($i = 0; $i < count($opiniones); $i++) {
                        echo "<li class=\"opinion\">";
                        echo "<span class=\"nota " . claseNota($opiniones[$i]['nota']) . "\">{$opiniones[$i]['nota']}</span>&nbsp;";
                        echo "<span class=\"nombre\">{$opiniones[$i]['usuario']}</span>&nbsp;";
                        echo "{$opiniones[$i]['texto']}&nbsp;";
                        echo "<span class=\"fecha\">{$opiniones[$i]['fecha']}</span>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            <?php } ?>
            <h3>Añade tu opinión</h3>
            <form method="POST">
                <p><input type="text" name="usuario" placeholder="Nombre" /></p>
                <p>Nota:
                    <select name="nota">
                        <?php
                        // Nota 0-10
                        for ($i = 0; $i <= 10; $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                        ?>
                    </select>
                </p>
                <p><textarea name="texto" placeholder="Escribe tu opinión"></textarea></p>
                <p><input type="submit" value="Enviar" /></p>
            </form>
        </div>
    </div>
</body>

</html>
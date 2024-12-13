<?php
$bd = new PDO('mysql:host=localhost;dbname=qatar2022;charset=utf8', 'root', '');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Paises de Qatar 2022</title>
    <link type="text/css" rel="stylesheet" href="qatar.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/qatar2022');

        * {
            font-family: 'Qatar2022', sans-serif;
        }
    </style>
    <script>
        function mostrarJugadores(str) {
            if (str.length == 0) {
                document.getElementById("jugadores").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("jugadores").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("POST", "paises Qatar 2022 jugadores.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("pais=" + str);
            }
        }
    </script>
</head>

<body>
    <header>
        <h2>Campeonato del Mundo QATAR - 2022</h2>
    </header>
    <div class="tabla">
        <table class="zigzag">
            <caption class="titulo">Paises</caption>
            <tbody>
                <tr>
                    <?php
                    $resultado = $bd->query('SELECT distinct pais FROM jugadores ORDER BY 1 ASC');
                    $contador = 0;
                    while ($pais = $resultado->fetch()) {
                        if ($contador != 0 && $contador % 4 == 0) {
                            echo "</tr>\n";
                            echo "<tr>\n";
                        }
                        echo '<td><input type="radio" name="pais" id="' . $pais['pais'] . '"';
                        echo ' onchange=mostrarJugadores(this.value) value="' . $pais['pais'];
                        echo '"><label for="' . $pais['pais'] . '">' . $pais['pais'] . '</label></td>' . "\n";
                        $contador++;
                    }
                    ?>
                </tr>
            </tbody>
        </table>
        <hr />
    </div>
    <div id="cuerpo">
        <h2 class="titulo">Jugadores</h2>
        <div id="jugadores">
            <!-- ... -->
        </div>
    </div>
    <footer>
        <p>Desarrollado por: Javier Duarte Pérez</p>
    </footer>
</body>

</html>
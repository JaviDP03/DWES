<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificación LaLiga</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }

        .derecha {
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>Clasificación de LaLiga</h2>
    <?php
    $equipos = array(
        "Barcelona",
        "Real Madrid",
        "Atlético Madrid",
        "Villareal",
        "Osasuna",
        "Athletic",
        "R.C.D. Mallorca",
        "Rayo Vallecano",
        "Celta de Vigo",
        "Betis",
        "Girona",
        "Sevilla",
        "Alavés",
        "RCD Espanyol",
        "Real Sociedad",
        "Getafe",
        "Leganés",
        "Valencia C.F.",
        "Valladolid",
        "U.D. Las Palmas"
    );

    $posicion = isset($_GET['posicion']) ? $_GET['posicion'] : 1;
    if ($posicion < 1 || $posicion > count($equipos)) {
        $posicion = 1;
    }
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : "";
    $equipoEncontrado = false;
    ?>
    <table>
        <tr>
            <th>Posición</th>
            <th>Club</th>
        </tr>
        <?php
        for ($i = $posicion - 1; $i < count($equipos); $i++) {
            if ($nombre == $equipos[$i]) {
                $equipoEncontrado = true;
            }

            if ($equipoEncontrado || $nombre == "") {
                echo "<tr>";
                echo "<td class=\"derecha\">" . $i + 1 . "</td>";
                echo "<td>$equipos[$i]</td>";
                echo "</tr>";
            }
        }

        if (!$equipoEncontrado && $nombre != "") {
            for ($i = 0; $i < count($equipos); $i++) {
                echo "<tr>";
                echo "<td class=\"derecha\">" . $i + 1 . "</td>";
                echo "<td>$equipos[$i]</td>";
                echo "</tr>";
            }
        }
        ?>
</body>

</html>
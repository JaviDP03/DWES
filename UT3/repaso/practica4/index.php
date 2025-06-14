<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de plazas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #cccccc;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    try {
        $bd = new PDO('mysql:host=localhost;dbname=fpAndaluza', 'root', '');
    } catch (PDOException $p) {
        echo "Se ha lanzado la excepción " . $p->getMessage() . "<br/>";
        exit();
    }

    $consultaPlazas = $bd->query("SELECT s.dni AS dni, DATE_FORMAT(s.horaSolicitud, '%d-%m-%Y') AS fecha, s.codCiclo AS codCiclo, c.nomCiclo AS nomCiclo, p.nomProvincia AS nomProvincia
    FROM solicitudesPlaza s
    INNER JOIN ciclos c ON s.codCiclo = c.codCiclo
    INNER JOIN provincias p ON s.codProvincia = p.codProvincia");
    ?>

    <h2>Tabla de plazas de la FP Andaluza</h2>
    <table>
        <caption>Solicitudes obtenidas: <?= $consultaPlazas->rowCount() ?></caption>
        <?php
        if (!$consultaPlazas->rowCount()) {
            echo "</table>\n</body>\n</html>";
            exit();
        }
        ?>
        <tr>
            <th>DNI</th>
            <th>Día</th>
            <th>Código del ciclo</th>
            <th>Nombre del ciclo</th>
            <th>Nombre de la provincia</th>
        </tr>
        <?php
        while ($linea = $consultaPlazas->fetch()) {
            echo "<tr>";
            echo "<td>" . $linea['dni'] . "</td>";
            echo "<td>" . $linea['fecha'] . "</td>";
            echo "<td>" . $linea['codCiclo'] . "</td>";
            echo "<td>" . $linea['nomCiclo'] . "</td>";
            echo "<td>" . $linea['nomProvincia'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br><hr>

    <h2>Tabla completa</h2>
    <?php
    $consultaPlazas2 = $bd->query("SELECT d.dni AS dni, DATE_FORMAT(s.horaSolicitud, '%d-%m-%Y') AS fecha, c.codCiclo AS codCiclo, c.nomCiclo AS nomCiclo, p.nomProvincia AS nomProvincia
    FROM (SELECT DISTINCT dni FROM solicitudesPlaza) d
    CROSS JOIN ciclos c
    LEFT JOIN solicitudesPlaza s ON d.dni = s.dni AND c.codCiclo = s.codCiclo
    LEFT JOIN provincias p ON s.codProvincia = p.codProvincia");
    ?>
    <table>
        <caption>Solicitudes obtenidas: <?= $consultaPlazas2->rowCount() ?></caption>
        <tr>
            <th>DNI</th>
            <th>Día</th>
            <th>Código del ciclo</th>
            <th>Nombre del ciclo</th>
            <th>Nombre de la provincia</th>
        </tr>
        <?php
        while ($linea = $consultaPlazas2->fetch()) {
            echo "<tr>";
            echo "<td>" . $linea['dni'] . "</td>";
            echo "<td>" . (!empty($linea['fecha']) ? $linea['fecha'] : "NULL") . "</td>";
            echo "<td>" . $linea['codCiclo'] . "</td>";
            echo "<td>" . $linea['nomCiclo'] . "</td>";
            echo "<td>" . (!empty($linea['nomProvincia']) ? $linea['nomProvincia'] : "NULL") . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>
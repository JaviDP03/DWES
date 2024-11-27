<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <?php
    try {
        $bd = new PDO('mysql:host=localhost;dbname=geografia', 'root', '');
    } catch (PDOException $e) {
        echo "Se ha lanzado la excepción " . $e->getMessage() . "<br/>";
        exit();
    }

    $consulta = $bd->query("SELECT p.provincia, c.comunidad, COUNT(m.idMunicipio) AS numero_municipios FROM comunidades c 
    JOIN provincias p ON c.idComunidad = p.idComunidad JOIN municipios m ON p.idProvincia = m.idProvincia GROUP BY m.idProvincia;");
    ?>

    <table>
        <tr>
            <?php
            $fila = $consulta->fetch(PDO::FETCH_ASSOC);
            foreach ($fila as $clave => $campo) {
                echo "<th>";
                echo $clave;
                echo "</th>";
            }
            ?>
        </tr>
        <?php
        do {
            echo "<tr>\n";
            echo "<td>{$fila['provincia']}</td>";
            echo "<td>{$fila['comunidad']}</td>";
            echo "<td>{$fila['numero_municipios']}</td>";
            echo "</tr>\n";

            $fila = $consulta->fetch(PDO::FETCH_ASSOC);
        } while ($fila = $consulta->fetch(PDO::FETCH_ASSOC));
        ?>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 2</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .centrado {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $familia = $_POST['familia']; ?>
    <form action="formulario3.php" method="POST">
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>PVP</th>
                <th>Elección</th>
            </tr>
            <?php
            $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
            $resultado = $bd->query("SELECT cod, nombre_corto, descripcion, PVP FROM producto WHERE familia = '$familia'");
            while ($registro = $resultado->fetch()) {
                echo "<tr>";
                echo "<td>" . $registro['cod'] . "</td>";
                echo "<td>" . $registro['nombre_corto'] . "</td>";
                echo "<td>" . $registro['descripcion'] . "</td>";
                echo "<td>" . $registro['PVP'] . "€</td>";
                echo "<td class=\"centrado\"><input type=\"radio\" name=\"producto\" value=\"" . $registro['cod'] . "\"></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p>
            <input type="submit" value="Buscar tiendas">
        </p>
    </form>
</body>

</html>
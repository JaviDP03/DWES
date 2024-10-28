<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1</title>
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
    <form action="formulario2.php" method="POST">
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Elección</th>
            </tr>
            <?php
            $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
            $resultado = $bd->query("SELECT * FROM familia");
            while ($registro = $resultado->fetch()) {
                echo "<tr>";
                echo "<td>" . $registro['cod'] . "</td>";
                echo "<td>" . $registro['nombre'] . "</td>";
                echo "<td class=\"centrado\"><input type=\"radio\" name=\"familia\" value=\"" . $registro['cod'] . "\"></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p>
            <input type="submit" value="Buscar productos">
        </p>
    </form>
</body>

</html>
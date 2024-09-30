<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.5</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
    $filas = $_GET['filas'];
    $columnas = $_GET['columnas'];
    ?>
    <hr>
    <table>
        <tr>
            <?php
            for ($i=0; $i < $columnas; $i++) { 
                echo "<th>Cabecera</th>";
            }
            ?>
        </tr>
        <?php
        for ($i=1; $i < $filas; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $columnas; $j++) { 
                echo "<td>Cuerpo</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
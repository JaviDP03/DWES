<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
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
    
    <table>
        <tr>
        <?php
        for ($i=0; $i < $columnas; $i++) { 
            echo "\t\t\t<th>Cabecera</th>\n";
        }
        ?>
        </tr>
        <?php
        for ($i=1; $i < $filas; $i++) { 
            echo "<tr>\n";
            for ($j=0; $j < $columnas; $j++) { 
                echo "\t\t\t<td>Cuerpo</td>\n";
            }
            echo "\t\t</tr>\n";
        }
        ?>
    </table>
</body>
</html>
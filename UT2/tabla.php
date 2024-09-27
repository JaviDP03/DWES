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
    $filas = $_REQUEST['filas'];
    $columnas = $_REQUEST['columnas'];
    ?>
    
    <table>
        <tr>
            <?php
            for ($i=0; $i < $columnas; $i++) { 
                echo "<th>Cabecera</th>";
            }
            ?>
        </tr>
        <?php
        for ($i=0; $i < --$filas; $i++) { 
            echo "<tr>";
            for ($i=0; $i < $columnas; $i++) { 
                echo "<td>Cuerpo</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
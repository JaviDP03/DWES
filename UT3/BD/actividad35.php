<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.5</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h2>Datos de un producto</h2>
    <form>
        <p>Código: <input type="text" name="codigo"></p>
        <p><input type="submit" name="submit"></p>
    </form>

    <?php
    $codigo = $_GET['codigo'];

    $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
    $resultado = $bd->query("SELECT * FROM producto WHERE cod = '$codigo'"); ?>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Familia</th>
        </tr>
        <?php
        while ($registro = $resultado->fetch()) {
            echo "<tr>";
            echo "<td>" . $registro['cod'] . "</td>";
            echo "<td>" . $registro['nombre_corto'] . "</td>";
            echo "<td>" . $registro['descripcion'] . "</td>";
            echo "<td>" . $registro['PVP'] . "</td>";
            echo "<td>" . $registro['familia'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 3</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php $producto = $_POST['producto']; ?>
    <form action="formulario4.php" method="POST">
        <table>
            <tr>
                <th>Producto</th>
                <th>Tienda</th>
                <th>Unidades</th>
            </tr>
            <?php
            $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
            $resultado = $bd->query("SELECT * FROM stock WHERE producto = '$producto'");
            while ($registro = $resultado->fetch()) {
                $resultado2 = $bd->query("SELECT nombre FROM tienda WHERE cod = '$registro[tienda]'");
                echo "<tr>";
                echo "<td>" . $registro['producto'] . "</td>";
                echo "<td>" . $registro['tienda'] . "</td>";
                echo "<td>" . $registro['unidades'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p>
            <input type="submit">
        </p>
    </form>
</body>

</html>
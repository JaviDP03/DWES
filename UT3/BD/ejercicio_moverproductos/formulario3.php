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
            $tienda = $bd->query("SELECT nombre FROM tienda WHERE cod = '{$registro['tienda']}'")->fetch();
            echo "<tr>";
            echo "<td>" . $registro['producto'] . "</td>";
            echo "<td>" . $tienda['nombre'] . "</td>";
            echo "<td>" . $registro['unidades'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <form action="resultado.php" method="POST">
        <p>
            Origen:
            <select name="tiendaorigen">
                <?php
                $resultado2 = $bd->query("SELECT * FROM stock WHERE producto = '$producto'");
                while ($registro2 = $resultado2->fetch()) {
                    $tienda2 = $bd->query("SELECT nombre FROM tienda WHERE cod = '{$registro2['tienda']}'")->fetch();
                    echo "<option value='" . $registro2['tienda'] . "'>" . $tienda2['nombre'] . "</option>";
                }
                ?>
            </select>
        </p>
        <p>
            Destino:
            <select name="tiendadestino">
                <?php
                $resultado3 = $bd->query("SELECT * FROM stock WHERE producto = '$producto'");
                while ($registro3 = $resultado3->fetch()) {
                    $tienda3 = $bd->query("SELECT nombre FROM tienda WHERE cod = '{$registro3['tienda']}'")->fetch();
                    echo "<option value='" . $registro3['tienda'] . "'>" . $tienda3['nombre'] . "</option>";
                }
                ?>
            </select>
        </p>
        <input type="hidden" name="producto" value="<?= $producto; ?>">
        <p>
            <input type="submit" name="submit">
        </p>
    </form>
</body>

</html>
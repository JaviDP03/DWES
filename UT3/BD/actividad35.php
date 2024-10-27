<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.5</title>
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
    <h2>Buscador de producto</h2>
    <form>
        <p>Código: <input type="text" name="codigo"></p>
        <p><input type="submit" name="submit"></p>
    </form>

    <?php
    if (!empty($_GET['codigo']) && isset($_GET['submit'])) {
        $codigo = $_GET['codigo'];
        $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
        $resultado = $bd->query("SELECT * FROM producto WHERE cod = '$codigo'");
        $resultado2 = $bd->query("SELECT * FROM stock WHERE producto = '$codigo'"); 
        
        if ($resultado->rowCount() == 0) {
            echo "<p>No se ha encontrado ningún producto con ese código</p>";
            return;
        }
        ?>

        <br>

        <h3>Datos del producto</h3>
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
                $tipoFamilia = $bd->query("SELECT nombre FROM familia WHERE cod = '$registro[familia]'");
                echo "<tr>";
                echo "<td>" . $registro['cod'] . "</td>";
                echo "<td>" . $registro['nombre_corto'] . "</td>";
                echo "<td>" . $registro['descripcion'] . "</td>";
                echo "<td>" . $registro['PVP'] . "€</td>";
                echo "<td>" . $tipoFamilia->fetch()['nombre'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <h3>Stock del producto</h3>
        <table>
            <tr>
                <th>Código</th>
                <th>Tienda</th>
                <th>Unidades</th>
            </tr>
            <?php
            while ($registro2 = $resultado2->fetch()) {
                $tienda = $bd->query("SELECT nombre FROM tienda WHERE cod = '$registro2[tienda]'");
                echo "<tr>";
                echo "<td>" . $registro2['tienda'] . "</td>";
                echo "<td>" . $tienda->fetch()['nombre'] . "</td>";
                echo "<td>" . $registro2['unidades'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php } ?>
</body>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 4</title>
</head>
<body>
<?php
    if (isset($_POST['submit'])) {
        $tiendaorigen = $_POST['tiendaorigen'];
        $tiendadestino = $_POST['tiendadestino'];
        $producto = $_POST['producto'];

        $ok = true;
        $bd = new PDO("mysql:host=localhost;dbname=tienda", "root", "");
        $bd->beginTransaction();
        if (!$registros = $bd->exec("UPDATE stock SET unidades = unidades-1 WHERE producto = '$producto' AND tienda = $tiendaorigen")) {
            $ok = false;
        }

        if (!$registros = $bd->exec("UPDATE stock SET unidades = unidades+1 WHERE producto = '$producto' AND tienda = $tiendadestino")) {
            $ok = false;
        }

        if ($ok) {
            $bd->commit();
            $tienda1 = $bd->query("SELECT nombre FROM tienda WHERE cod = $tiendaorigen")->fetch();
            $tienda2 = $bd->query("SELECT nombre FROM tienda WHERE cod = $tiendadestino")->fetch();
            echo "<p>Un producto $producto se ha movido de {$tienda1['nombre']} a {$tienda2['nombre']}</p>";
        } else {
            $bd->rollback();
            echo "<p>Rollback ejecutado</p>";
        }
    }
    ?>
    <a href="formulario1.php">Volver</a>
</body>
</html>
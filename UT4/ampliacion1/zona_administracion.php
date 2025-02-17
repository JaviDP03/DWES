<!DOCTYPE html>
<?php
if (!isset($_COOKIE['user']) || $_COOKIE['rol'] != 'admin') {
    header("Location: login.php");
}

try {
    $bd = new PDO('mysql:host=localhost;dbname=zonaR', 'root', '');
} catch (PDOException $p) {
    echo "<p>Se ha lanzado la excepción " . $p->getMessage() . "</p>";
    exit();
}

$consulta = $bd->query("SELECT * FROM usuarios");
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administración</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Zona Administración</h1>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Rol</th>
        </tr>
        <?php
        while ($fila = $consulta->fetch()) {
            echo "<tr>";
            echo "<td>" . $fila['user'] . "</td>";
            echo "<td>" . $fila['name'] . "</td>";
            echo "<td>" . $fila['rol'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>

</html>
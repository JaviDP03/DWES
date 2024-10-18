<?php
// TODO: Incluir el archivo de funciones
include("funciones.php");
$productos = array();
if (isset($_REQUEST['submit'])) {
    $productos = array_merge($productos, recuperarProductos());
}
// if (/* TODO: Si el botón de borrar ha sido pulsado...*/) {
// $productos = array_merge($productos, recuperarProductos());
// }
?>
<html>

<head>
    <title>Lista de la compra</title>
    <style>
        th, td {
            border: 1px solid;
            border-collapse: collapse;
        }

        .derecha {
            text-align: right;
        }

        .vacio {
            border: 0px;
        }
    </style>
</head>

<body>
    <h2>LISTA DE LA COMPRA PARA EL <?= date("d/m/Y") ?></h2>
    <?php
    if (empty($_REQUEST)) {
        echo "<p>Lista de la compra vacía</p>";
    } else {
        $producto = array();
        $producto['nombre'] = $_POST['nombre'];
        $producto['cantidad'] = $_POST['cantidad'];
        $producto['precio'] = $_POST['precio'];
        calcularPrecioTotalProducto($producto);
        $productos[] = $producto;
        
        mostrarTabla($productos);
    }
    ?>

    <h2>Añadir producto</h2>
    <form method="POST">
        <p>Producto:* <input type="text" name="nombre" value="Nombre Producto"></p>
        <p>Cantidad:* <input type="number" min="0.1" step="0.1" name="cantidad" value="1"></p>
        <p>Precio:* <input type="number" min="0.1" step="0.1" name="precio" value="1"></p>
        <p><input type="submit" name="submit"></p>
        <?php echo hiddenProductos($productos); ?>
    </form>
    <h2>Borrar producto</h2>
    <form>
        <?php echo hiddenProductos($productos); ?>
    </form>
</body>

</html>
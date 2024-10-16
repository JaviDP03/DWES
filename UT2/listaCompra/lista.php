<?php
// TODO: Incluir el archivo de funciones
include("funciones.php");
$productos = array();
// if (/* TODO: Si el botón de insertar ha sido pulsado...*/) {
$productos = array_merge($productos, recuperarProductos());
// }
// if (/* TODO: Si el botón de borrar ha sido pulsado...*/) {
$productos = array_merge($productos, recuperarProductos());
// }
?>
<html>

<head>
    <title>Lista de la compra</title>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <pre>
        <?php
        print_r($_REQUEST);
        ?>
    </pre>
    <h2>LISTA DE LA COMPRA PARA EL <?= date("d/m/Y") ?></h2>
    <?php
    if (empty($_REQUEST)) {
        echo "<p>Lista de la compra vacía</p>";
    } else { ?>
        <table>
            <tr>
                <th>Producto</th><th>Cantidad</th><th>Precio</th>
            </tr>
        </table>
        
    <?php } ?>

    <h2>Añadir producto</h2>
    <form>
        <p>Producto:* <input type="text" name="nombre"></p>
        <p>Cantidad:* <input type="number" min="0.1" step="0.1" name="cantidad"></p>
        <p>Precio:* <input type="number" min="0.1" step="0.1" name="precio"></p>
        <p><input type="submit"></p>
        <?php echo hiddenProductos($productos); ?>
    </form>
    <h2>Borrar producto</h2>
    <form>
        <?php echo hiddenProductos($productos); ?>
    </form>
</body>

</html>
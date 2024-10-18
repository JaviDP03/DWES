<?php
// Recibe un array con información de un producto POR REFERENCIA y le asigna el valor de total
function calcularPrecioTotalProducto(&$producto)
{
    $producto['total'] = $producto['cantidad'] * $producto['precio'];
}
// Recibe lista de productos
// Devuelve la suma de todos los totales
function calcularPrecioTotalCompra($productos) {
    $totalCompra = 0;

    foreach ($productos as $producto) {
        $totalCompra += $producto['total'];
    }

    return $totalCompra;
}
function hiddenProductos($productos)
{
    $html = "";
    foreach ($productos as $producto) {
        $html .= '<input type="hidden" name="hidNombres[]" value="' .
            $producto['nombre'] . '" />';
        $html .= '<input type="hidden" name="hidCantidades[]" value="' .
            $producto['cantidad'] . '" />';
        $html .= '<input type="hidden" name="hidPrecios[]" value="' .
            $producto['precio'] . '" />';
        $html .= '<input type="hidden" name="hidTotales[]" value="' .
            $producto['total'] . '" />';
    }
    return $html;
}
function recuperarProductos()
{
    $productos = array();
    if (isset($_POST['hidNombres'])) {
        for ($i = 0; $i < count($_POST['hidNombres']); $i++) {
            $producto = array();
            $producto['nombre'] = $_POST['hidNombres'][$i];
            $producto['cantidad'] = $_POST['hidCantidades'][$i];
            $producto['precio'] = $_POST['hidPrecios'][$i];
            $producto['total'] = $_POST['hidTotales'][$i];
            $productos[] = $producto;
        }
    }
    return $productos;
}

function mostrarTabla($productos)
{ ?>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
        <?php
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>{$producto['nombre']}</td>";
            echo "<td class=\"derecha\">{$producto['cantidad']}</td>";
            echo "<td class=\"derecha\">{$producto['precio']}€</td>";
            echo "<td class=\"derecha\">{$producto['total']}€</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td class="vacio" colspan="3"></td>
            <td class="derecha"><?= calcularPrecioTotalCompra($productos) ?>€</td>
        </tr>
    </table>
<?php }

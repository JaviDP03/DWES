<?php
// Recibe un array con información de un producto POR REFERENCIA y le asigna el valor de total
function calcularPrecioTotalProducto($producto) {
    $producto['total'] = $producto['cantidad'] * $producto['precio'];
}
// Recibe lista de productos
// Devuelve la suma de todos los totales
function calcularPrecioTotalCompra(/* productos */) {}
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

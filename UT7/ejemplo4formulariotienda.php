<?php
// ejemplo4formulario.php
$bd = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'dwes', 'abc123');
?>
<html>

<head>
    <meta charset="utf8" />
    <script src="ejemplo4tienda.js"></script>
</head>

<body>

    <form>
        <label for="selProducto">Seleccione un producto:</label>
        <select name="selProducto" onchange="mostrarProducto(this.value)">
            <option value="">Seleccione...</option>
            <?php
            $resultado = $bd->query('SELECT cod, nombre_corto FROM producto ORDER BY nombre_corto ASC');
            while ($producto = $resultado->fetch()) {
                echo '<option value="' . $producto['cod'] . '">' . $producto['nombre_corto'] . '</option>';
            }
            ?>
        </select>
    </form>
    <div id="ficha" style="display: none;">
        <h2><span id="spnNombre"></span></h2>
        <p><strong>Descripción</strong>: <span id="spnDescripcion"></span></p>
        <p><strong>Precio</strong>: <span id="spnPrecio"></span></p>
    </div>
    </div>

</body>

</html>
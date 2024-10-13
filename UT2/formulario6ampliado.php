<?php
function mostrarFormulario($valorUsuario, $valorClave, $valorMayorEdad) {
?>
    <form>
        <p>Usuario:<sup>*</sup> <input name="usuario" placeholder="Intro usuario..." value="<?= $valorUsuario ?>"></p>
        <p>Clave: <sup>*</sup> <input name="clave" placeholder="Intro clave..." value="<?= $valorClave ?>"></p>
        <p>
            Mayor de edad:<sup>*</sup>
            <input type="radio" name="mayorEdad" value="si" <?= $valorMayorEdad == "si" ? "checked=\"checked\"" : "" ?>> Sí
            <input type="radio" name="mayorEdad" value="no" <?= $valorMayorEdad == "no" ? "checked=\"checked\"" : "" ?>> No
        </p>
        <p><input type="submit"></p>
    </form>
<?php
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 6 ampliado</title>
    <style>
        sup, input::placeholder {
            color: red;
        }
    </style>
</head>

<body>
    <!-- <p><?= $_SERVER['PHP_SELF']; ?></p> -->
    <pre>
<?php
print_r($_REQUEST);
?>
    </pre>
<?php
$valorUsuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
$valorClave = isset($_REQUEST['clave']) ? $_REQUEST['clave'] : "";
$valorMayorEdad = isset($_REQUEST['mayorEdad']) ? $_REQUEST['mayorEdad'] : "";
if (
    ($valorUsuario == "")
    or
    ($valorClave == "")
    or
    ($valorMayorEdad == "")
   ){
        mostrarFormulario($valorUsuario, $valorClave, $valorMayorEdad);
} else {
        echo "<h2>Proceso completado</h2>";
}

?>
</body>

</html>
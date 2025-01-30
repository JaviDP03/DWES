<?php
require_once "funciones.php";
require_once "bd.php";

$login = login($bd);
theHeader();
?>
<main>
    <h2>Login</h2>
    <form method="POST">
        <fieldset>
            <legend>Introduce tus datos</legend>
            <p>
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" />
            </p>
            <p>
                <label for="clave">Contraseña:</label>
                <input type="password" name="password" />
        </fieldset>
        <p>
            <input type="submit" name="entrar" value="Entrar" />
        </p>
    </form>
    <?php
    if (isset($login) && !$login) {
        echo "<p class=\"alerta\">Usuario o contraseña incorrecto/s</p>";
    }
    ?>
</main>
<?php
theFooter();

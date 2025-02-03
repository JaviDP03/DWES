<?php
session_start();
?>
<pre>
    <?php
    echo "<p>\$_SESSION</p>";
    print_r($_SESSION);
    echo "<p>\$_COOKIE</p>";
    print_r($_COOKIE);

    // Comprobamos si la variable ya existe
    if (isset($_SESSION['visitas']))
        $_SESSION['visitas']++;
    else
        $_SESSION['visitas'] = 0;

    // En cada visita añadimos un valor al array "visitas"
    $_SESSION['horaVisitas'][] = date('d-m-Y H:i:s');
    ?>
</pre>
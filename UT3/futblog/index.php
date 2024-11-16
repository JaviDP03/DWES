<?php
require_once "funciones.php";
require_once "bd.php";
theHeader();
?>
<h2>Últimas entradas</h2>
<ul class="listaNoticias">
    <?php
    /* OBTENER DE LA BD LA LISTA DE NOTICIAS Y PASARSELAS A bloqueNoticia. OBTENER
    TAMBIÉN TOTAL DE COMENTARIOS */
    $consulta = $bd->query("SELECT * FROM noticias");

    for ($i = 0; $i < $consulta->rowCount(); $i++) { // BUCLE DE MUESTRA
        $noticia = $consulta->fetch();
        bloqueNoticia($noticia);
    }
    ?>
</ul>
<?php
theFooter();

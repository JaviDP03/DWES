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
    for ($i = 0; $i < 3; $i++) { // BUCLE DE MUESTRA
        $noticia = "";
        bloqueNoticia($noticia);
    }
    ?>
</ul>
<?php
theFooter();

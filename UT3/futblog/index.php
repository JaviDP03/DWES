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
    $consulta = $bd->query("SELECT n.*, COUNT(c.id_noticia) AS numerocomentarios FROM noticias n
    LEFT JOIN comentarios c ON n.id_noticia = c.id_noticia GROUP BY n.id_noticia");

    for ($i = 0; $i < $consulta->rowCount(); $i++) { // BUCLE DE MUESTRA
        $noticia = $consulta->fetch();
        bloqueNoticia($noticia);
    }
    ?>
</ul>
<?php
theFooter();

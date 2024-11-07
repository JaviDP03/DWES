<?php
require_once "funciones.php";
require_once "bd.php";
if (isset($_POST['btnComentario'])) {
    // INSERTAR COMENTARIO
}
// CONSULTAR NOTICIA
if (false) { /* COMPROBAR SI NO HA HABIDO RESULTADOS. SI ES ASÍ, LANZAMOS ERROR 404*/
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
    include 'error404.php';
    exit();
}
// OBTENER DATOS NOTICIA
// REEMPLAZAR TEXTO EN MAYUSCULAS (TITULAR,FECHA,ID,CUERPO)
theHeader("TITULAR");
?>
<p class="small"><a href="index.php">← Volver a portada</a></p>
<h2>TITULAR</h2>
<p class="small">Publicado en: FECHA</p>
<div id="imgcover"><img src='images/cover-ID.jpg' /></div>
CUERPO
<h2>Comentarios</h2>
<?php
// OBTENER COMENTARIOS DE LA NOTICIA
if (true) { // SI HAY COMENTARIOS
    echo '<ul>';
    for ($i = 0; $i < 3; $i++) { // BUCLE DE MUESTRA
        $comentario = "";
        bloqueComentario($comentario);
    }
    echo '</ul>';
} else {
    echo "<p>Sin comentarios</p>";
}
?>
<strong>Deja un comentario</strong>
<form id="frmComentario" method="post" action="<?php echo $_SERVER['PHP_SELF'] .
                                                    '?' . $_SERVER['QUERY_STRING'] ?>">
    <input name="hidNoticia" type="hidden" value="<?php echo $_GET['id']; ?>" />
    <p><input name="txtAutor" type="text" placeholder="Nombre" /></p>
    <p><textarea placeholder="Escribe tu comentario"
            name="txtComentario"></textarea></p>
    <p><input type="submit" name="btnComentario" value="Comentar" /></p>
</form>
<?php
theFooter();

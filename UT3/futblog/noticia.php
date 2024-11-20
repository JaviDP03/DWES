<?php
require_once "funciones.php";
require_once "bd.php";
if (isset($_POST['btnComentario']) && !empty($_POST['txtAutor']) && !empty($_POST['txtComentario'])) {
    // INSERTAR COMENTARIO
    $autor = $_POST['txtAutor'];
    $texto = $_POST['txtComentario'];
    $fecha = date("Y-m-d H:i:s");
    $id_noticia = $_POST['hidNoticia'];

    $bd->beginTransaction();
    $existeComentario = false;

    $verificarComentarios = $bd->query("SELECT * FROM comentarios WHERE id_noticia = $id_noticia");
    while ($unComentario = $verificarComentarios->fetch()) {
        if ($unComentario['autor'] == $autor && $unComentario['texto'] == $texto) {
            $existeComentario = true;
            break;
        }
    }

    $bd->exec("INSERT INTO comentarios (autor, texto, fecha, id_noticia) VALUES ('$autor', '$texto', '$fecha', $id_noticia)");

    if ($existeComentario) {
        $bd->rollBack();
    } else {
        $bd->commit();
    }
}
// CONSULTAR NOTICIA
$id_noticia = isset($_GET['id']) ? $_GET['id'] : 0;
$consulta_noticia = $bd->prepare("SELECT * FROM noticias WHERE id_noticia = ?");
$consulta_noticia->execute([$id_noticia]);
if (!$consulta_noticia->rowCount()) { /* COMPROBAR SI NO HA HABIDO RESULTADOS. SI ES ASÍ, LANZAMOS ERROR 404*/
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
    include 'error404.php';
    exit();
}
// OBTENER DATOS NOTICIA
$noticia = $consulta_noticia->fetch();
// REEMPLAZAR TEXTO EN MAYUSCULAS (TITULAR,FECHA,ID,CUERPO)
theHeader($noticia['titular']);
?>
<p class="small"><a href="index.php">← Volver a portada</a></p>
<h2><?= $noticia['titular'] ?></h2>
<p class="small">Publicado en: <?= $noticia['fecha'] ?></p>
<div id="imgcover"><img src='images/cover-<?= $noticia['id_noticia'] ?>.jpg' /></div>
<?= $noticia['cuerpo'] ?>
<h2>Comentarios</h2>
<?php
// OBTENER COMENTARIOS DE LA NOTICIA
$comentarios = $bd->prepare("SELECT * FROM comentarios WHERE id_noticia = ?");
$comentarios->bindParam(1, $id_noticia);
$comentarios->execute();
if ($comentarios->rowCount()) { // SI HAY COMENTARIOS
    echo '<ul>';
    for ($i = 0; $i < $comentarios->rowCount(); $i++) { // BUCLE DE MUESTRA
        $comentario = $comentarios->fetch();
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
    <input name="hidNoticia" type="hidden" value="<?php echo $id_noticia; ?>" />
    <p><input name="txtAutor" type="text" placeholder="Nombre" /></p>
    <p><textarea placeholder="Escribe tu comentario"
            name="txtComentario"></textarea></p>
    <p><input type="submit" name="btnComentario" value="Comentar" /></p>
</form>
<?php
theFooter();

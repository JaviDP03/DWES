<?php
function bloqueNoticia($noticia)
{ // REEMPLAZAR TEXTO EN MAYUSCULAS (ID,TITULAR,ENTRADILLA,FECHA,NUMERO_DE_COMENTARIOS)
    global $bd;
    $consulta = $bd->query("SELECT n.id_noticia, COUNT(c.id_noticia) AS numerocomentarios FROM noticias n LEFT JOIN comentarios c ON n.id_noticia = c.id_noticia
    WHERE n.id_noticia = {$noticia['id_noticia']} GROUP BY n.id_noticia");
    $numeroComentarios = $consulta->fetch();

    echo "<li class='bloqueNoticia'>";
    echo "<img src='images/thumbnail-{$noticia['id_noticia']}.jpg' />";
    echo "<h3><a href='noticia.php?id={$noticia['id_noticia']}'>{$noticia['titular']}</a></h3>";
    echo "<p>{$noticia['entradilla']}</p>";
    echo "<p><a href='noticia.php?id={$noticia['id_noticia']}'>Leer más</a></p>";
    echo "<p>Publicada en: {$noticia['fecha']}. ({$numeroComentarios['numerocomentarios']}) comentarios.</p>";
    echo "</li>";
}
function bloqueComentario($comentario)
{ // REEMPLAZAR TEXTO EN MAYUSCULAS (AUTOR,FECHA,TEXTO)
    echo "<li class='bloqueComentario'>";
    echo "<p><strong>{$comentario['autor']}</strong> en {$comentario['fecha']}:";
    echo "<p>{$comentario['texto']}</p>";
    echo "</li>";
}
function theHeader($titulo = null)
{
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title><?php if ($titulo) {
                    echo $titulo . ' - ';
                }
                ?>FutBlog</title>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <header>
            <h1><a href="index.php">FutBlog</a></h1>
        </header>
        <div id="container">
            <div id="main">
            <?php
        }
        function theFooter()
        {
            ?>
            </div>
        </div>
        <?php // REEMPLAZAR TEXTO EN MAYUSCULAS (TU_NOMBRE) 
        ?>
        <footer>Copyright © <?php date("Y") ?><span>Javier Duarte Pérez <a href='index.php'>FutBlog</a></span></footer>
    </body>

    </html>
<?php
        }

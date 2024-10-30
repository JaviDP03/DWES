<?php
function bloqueNoticia($noticia)
{ // REEMPLAZAR TEXTO EN MAYUSCULAS (ID,TITULAR,ENTRADILLA,FECHA,NUMERO_DE_COMENTARIOS)
    echo "<li class='bloqueNoticia'>";
    echo "<img src='images/thumbnail-ID.jpg' />";
    echo "<h3><a href='noticia.php?id=ID'>TITULAR</a></h3>";
    echo "<p>ENTRADILLA</p>";
    echo "<p><a href='noticia.php?id=ID'>Leer más</a></p>";
    echo "<p>Publicada en: FECHA. (NUMERO_DE_COMENTARIOS) comentarios.</p>";
    echo "</li>";
}
function bloqueComentario($comentario)
{ // REEMPLAZAR TEXTO EN MAYUSCULAS (AUTOR,FECHA,TEXTO)
    echo "<li class='bloqueComentario'>";
    echo "<p><strong>AUTOR</strong> en FECHA:";
    echo "<p>TEXTO</p>";
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
                ?>The Hack blog</title>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <header>
            <h1><a href="index.php">The Hack blog</a></h1>
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
        <footer>Copyright © <?php date("Y") ?><span>TU_NOMBRE<a href='index.php'>The Hack
                    Blog</a></span></footer>
    </body>

    </html>
<?php
        }

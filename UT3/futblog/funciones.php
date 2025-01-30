<?php
function bloqueNoticia($noticia)
{
    // REEMPLAZAR TEXTO EN MAYUSCULAS (ID,TITULAR,ENTRADILLA,FECHA,NUMERO_DE_COMENTARIOS)
    echo "<li class='bloqueNoticia'>";
    echo "<img src='images/thumbnail-{$noticia['id_noticia']}.jpg' />";
    echo "<h3><a href='noticia.php?id={$noticia['id_noticia']}'>{$noticia['titular']}</a></h3>";
    echo "<p>{$noticia['entradilla']}</p>";
    echo "<p><a href='noticia.php?id={$noticia['id_noticia']}'>Leer más</a></p>";
    echo "<p>Publicada en: {$noticia['fecha']}. ({$noticia['numerocomentarios']}) comentarios.</p>";
    echo "</li>";
}

function bloqueComentario($comentario)
{
    // REEMPLAZAR TEXTO EN MAYUSCULAS (AUTOR,FECHA,TEXTO)
    echo "<li class='bloqueComentario'>";
    echo "<p><strong>{$comentario['autor']}</strong> en {$comentario['fecha']}:";
    echo "<p>{$comentario['texto']}</p>";
    echo "</li>";
}

function autenticado()
{
    return isset($_COOKIE['login']);
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
            <div class="menu">
                <h1><a href="index.php">FutBlog</a></h1>
            </div>
            <div class="user-actions">
                    <h3 id="usuario"><?= autenticado() ? $_COOKIE['login'] : "" ?></h3>
                    <h4 class="boton-login"><a href="login.php"><?= autenticado() ? "Cerrar sesión" : "Iniciar sesión" ?></a></h4>
            </div>
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
        <footer>Copyright © <?php echo date("Y"); ?> <span>Javier Duarte Pérez <a href='index.php'>FutBlog</a></span></footer>
    </body>

    </html>
<?php
        }

        function login($bd) {
            if (autenticado()) {
                setcookie('login', '', time() - 3600);
                header('Location: index.php');
            }

            if (isset($_POST['entrar'])) {
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                
                $consulta = $bd->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
                $consulta->execute([$usuario, $password]);

                if ($consulta->rowCount()) {
                    setcookie('login', $usuario, time() + 3600);
                    header('Location: index.php');
                    return true;
                } else {
                    return false;
                }
            }
        }

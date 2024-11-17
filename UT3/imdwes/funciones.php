<?php
// Dentro de la función que comprueba si el nombre de usuario está permitido se ha de usar la siguiente lista negra:
$listaNegra = array("Manolo29", "LuciaUchiha", "Ecijano42", "usuario", "root");

function conexionBD()
{
    return new PDO('mysql:host=localhost;dbname=IMDwes', 'root', '');
}

function consultarOpiniones($bd)
{
    $consulta = $bd->query("SELECT * FROM opiniones");
    return $consulta->fetchAll();
}

function insertarOpinion($bd)
{
    if (!empty($_POST['usuario']) && !empty($_POST['nota']) && !empty($_POST['texto'])) {
        $usuario = $_POST['usuario'];
        $nota = $_POST['nota'];
        $texto = $_POST['texto'];
        $fecha = date('Y-m-d H:i:s');

        $bd->beginTransaction();

        $opinion = $bd->exec("INSERT INTO opiniones (usuario, nota, texto, fecha) VALUES ('$usuario', '$nota', '$texto', '$fecha')");

        if (!$opinion) {
            $bd->rollBack();
            echo "<p>Error al insertar la opinión</p>";
        } else if (filtro($usuario)) {
            $bd->rollBack();
            echo "<p>Usuario vetado</p>";
        } else {
            $bd->commit();
            echo "<p>Opinión insertada</p>";
        }
    }
}

function filtro($usuario)
{
    global $listaNegra;
    for ($i = 0; $i < count($listaNegra); $i++) {
        if ($listaNegra[$i] == $usuario) {
            return true;
        }
    }
    return false;
}

function claseNota($nota)
{
    switch ($nota) {
        case 0:
        case 1:
        case 2:
        case 3:
            $valoracion = "peli_mala";
            break;
        case 4:
        case 5:
        case 6:
            $valoracion = "peli_regular";
            break;
        case 7:
        case 8:
            $valoracion = "peli_buena";
            break;
        case 9:
        case 10:
            $valoracion = "peli_muy_buena";
            break;
    }

    return $valoracion;
}

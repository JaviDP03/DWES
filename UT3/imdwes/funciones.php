<?php
// Dentro de la función que comprueba si el nombre de usuario está permitido se ha de usar la siguiente lista negra:
$listaNegra = array("Manolo29", "LuciaUchiha", "Ecijano42", "usuario", "root");

// Función que devuelve una conexión a la base de datos
function conexionBD()
{
    return new PDO('mysql:host=localhost;dbname=IMDwes', 'root', '');
}

// Función que devuelve las opiniones almacenadas en la base de datos
function consultarOpiniones($bd)
{
    $consulta = $bd->query("SELECT * FROM opiniones");
    return $consulta->fetchAll();
}

// Función que inserta una opinión en la base de datos
function insertarOpinion($bd)
{
    if (!empty($_POST['usuario']) && isset($_POST['nota']) && !empty($_POST['texto'])) { // Se comprueba que los campos no estén vacíos
        $usuario = $_POST['usuario'];
        $nota = $_POST['nota'];
        $texto = $_POST['texto'];
        $fecha = date('Y-m-d H:i:s');

        $bd->beginTransaction(); // Se inicia una transacción

        $opinion = $bd->exec("INSERT INTO opiniones (usuario, nota, texto, fecha) VALUES ('$usuario', '$nota', '$texto', '$fecha')"); // Se insertan los datos

        // Si hay algún fallo o el usuario está en la lista negra, se cancela la transacción
        if (!$opinion) {
            $bd->rollBack();
        } else if (filtro($usuario)) {
            $bd->rollBack();
        } else {
            $bd->commit();
        }
    }
}

// Función que comprueba en una lista negra el nombre de usuario introducido
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

// Función que devuelve la clase CSS correspondiente a la nota
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

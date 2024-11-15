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
        $opinion = $bd->exec("INSERT INTO opiniones (usuario, nota, texto, fecha) VALUES ('$usuario', '$nota', '$texto', '$fecha')");
    }
}

<?php
//ejemplo2servidor.php
$bd = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8', 'dwes', 'abc123');

if (isset($_GET['id'])) {
    echo '<option value="">Seleccione...</option>'; // Imprimimos opción vacía

    $consulta = $bd->prepare("SELECT id, provincia FROM provincias WHERE comunidad_id = :id");
    $consulta->execute(['id' => $_GET['id']]);
    while ($provincia = $consulta->fetch()) {
        echo '<option value="' . $provincia['id'] . '">' . $provincia['provincia'] . '</option>';
    }
} else {
    echo "";
}

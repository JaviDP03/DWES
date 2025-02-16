<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=zonaR;charset=utf8', 'root', '');
} catch(PDOException $p) {
    echo "<p>Se ha lanzado la excepción " . $p->getMessage(). "</p>";
    exit();
}

$datos = [
    ['user' => 'juan', 'password' => password_hash('juan1234', PASSWORD_DEFAULT), 'name' => 'Juan'],
    ['user' => 'maria', 'password' => password_hash('maria1234', PASSWORD_DEFAULT), 'name' => 'María'],
    ['user' => 'pedro', 'password' => password_hash('pedro1234', PASSWORD_DEFAULT), 'name' => 'Pedro'],
    ['user' => 'laura', 'password' => password_hash('laura1234', PASSWORD_DEFAULT), 'name' => 'Laura']
];

$insercion = $bd->prepare("INSERT INTO usuarios (user, password, name) VALUES (:user, :password, :name)");

foreach ($datos as $linea) {
    try {
        $insercion->execute($linea);
    } catch (PDOException $p) {
        echo "<p>Ya se han insertado los datos</p>";
        exit();
    }
}

echo "<p>Se han insertado los datos correctamente</p>";
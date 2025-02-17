<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=zonaR;charset=utf8', 'root', '');
} catch(PDOException $p) {
    echo "<p>Se ha lanzado la excepción " . $p->getMessage(). "</p>";
    exit();
}

$datos = [
    ['user' => 'juan', 'password' => password_hash('juan1234', PASSWORD_DEFAULT), 'name' => 'Juan', 'rol' => 'admin'],
    ['user' => 'maria', 'password' => password_hash('maria1234', PASSWORD_DEFAULT), 'name' => 'María', 'rol' => 'admin'],
    ['user' => 'pedro', 'password' => password_hash('pedro1234', PASSWORD_DEFAULT), 'name' => 'Pedro', 'rol' => 'user'],
    ['user' => 'laura', 'password' => password_hash('laura1234', PASSWORD_DEFAULT), 'name' => 'Laura', 'rol' => 'user']
];

$insercion = $bd->prepare("INSERT INTO usuarios (user, password, name, rol) VALUES (:user, :password, :name, :rol)");

foreach ($datos as $linea) {
    try {
        $insercion->execute($linea);
    } catch (PDOException $p) {
        echo "<p>Ya se han insertado los datos</p>";
        exit();
    }
}

echo "<p>Se han insertado los datos correctamente</p>";
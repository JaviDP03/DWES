<?php
// ejemplo1.php
// Array con nombres
$a[] = "Ana";
$a[] = "Begoña";
$a[] = "Conchita";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Flora";
$a[] = "Gunda";
$a[] = "Hilda";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Karen";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ofelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Dora";
$a[] = "Eva";
$a[] = "Evita";
$a[] = "Sandra";
$a[] = "Noelia";
$a[] = "Sara";
$a[] = "Violet";
$a[] = "Lisa";
$a[] = "Elisabeth";
$a[] = "Elena";
$a[] = "Laura";
$a[] = "Vicky";

// Almacenamos en $q el parámetro.
$q = $_REQUEST["q"];

$sugerencia = "";

// Comparamos $q con todos los nombres a ver si coincide con el principio ""
if ($q !== "") {
    $longitudTexto = strlen($q);
    foreach ($a as $nombre) {
        if (stristr($q, substr($nombre, 0, $longitudTexto))) { // Comprobamos si coinciden.
            if ($sugerencia === "") {
                $sugerencia = $nombre;
            } else {
                $sugerencia .= ", $nombre";
            }
        }
    }
}

// Si no hay ningún resultado devolvemos "Sin sugerencias".
echo $sugerencia === "" ? "Sin sugerencias" : $sugerencia;

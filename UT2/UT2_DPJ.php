<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Cambia TU_NOMBRE por tu nombre real -->
    <title>Práctico UT2 - Javier Duarte Pérez</title>
    <style>
        /* Crea aquí las reglas de estilos necesarias para que todas las celdas de la
            tabla tengan bordes */
        table,
        td {
            border: 1px solid;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>DWES - Examen Práctico UT2</h2>
    <?php
    // A partir del siguiente array se pide ponerle un nombre y borrar algunos elementos,
    // crear una copia con reordenación de índices y mostrar en una tabla los elementos 
    // de esa copia.
    $nombres = array(
        "Ana",
        "Begoña",
        "Conchita",
        "Diana",
        "Eva",
        "Flora",
        "Gunda",
        "Hilda",
        "Inga",
        "Johanna",
        "Karen",
        "Linda",
        "Nina",
        "Ofelia",
        "Petunia",
        "Amanda",
        "Raquel",
        "Cindy",
        "Dora",
        "Eva",
        "Evita",
        "Sandra",
        "Noelia",
        "Sara",
        "Violet",
        "Lisa",
        "Elisabeth",
        "Elena",
        "Laura",
        "Vicky"
    );

    // Pregunta si no existe el primer parámetro o si no existe el segundo parámetro
    if ((empty($_GET['n1']) && !isset($_GET['n1'])) || (empty($_GET['n2']) && !isset($_GET['n1']))) {
        // Presenta un mensaje informando de la forma correcta de ejecución por URL
        echo "<p>No se han introducidos parámetros o se ha hecho de manera errónea</p>";
        echo "<p>Verifica que tu URL esté así: {$_SERVER['REMOTE_ADDR']}{$_SERVER['PHP_SELF']}?n1=valor&n2=valor</p>";
        echo "<p>En valor introduce un número entero entre 0 y 29, siendo n1 menor que n2</p>";
    } else {
        // Preasignar a variable los dos parámetros de la URL
        $numero1 = $_GET['n1'];
        $numero2 = $_GET['n2'];

        // Borrar todos los elementos del array cuyos índices estén entre el primer parámetro
        // y el segundo parámetro
        for ($i = $numero1; $i <= $numero2; $i++) {
            unset($nombres[$i]);
        }

        // Mostrar con print_r() el array completo, visualizando cada elemento en una fila
        echo "<pre>";
        print_r($nombres);
        echo "</pre>";

        // Reordenar el array dejando índices consecutivos y asignar el resultado a otro array
        $nombresReordenados = array_values($nombres);

        // Realizar una llamada a una función creada al final de este propio script que muestra
        // todos los elementos del 2º array en una tabla con bordes de 5 filas x 6 columnas
        imprimirArrayEnTabla($nombresReordenados);
    }

    function imprimirArrayEnTabla($arrayNombres)
    {
        $contadorArray = 0;
        $longitudArray = count($arrayNombres);

        echo "<table>\n";
        for ($i = 0; $i < 5; $i++) {
            echo "<tr>\n";
            for ($j = 0; $j < 6; $j++) {
                echo "<td>";
                if ($contadorArray < $longitudArray) {
                    echo $arrayNombres[$contadorArray];
                } else {
                    echo "----";
                }
                echo "</td>\n";
                $contadorArray++;
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    }
    ?>

</body>

</html>
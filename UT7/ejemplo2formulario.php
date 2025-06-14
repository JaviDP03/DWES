<?php
// ejemplo2formulario.php
$bd = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8', 'dwes', 'abc123');

?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <script>
        function actualizaProvincias(idComunidad) {
            if (idComunidad == "") {
                document.getElementById("selProvincia").innerHTML = "";
                document.getElementById("selProvincia").disabled = true;
                actualizaMunicipios("");
                return;
            } else {
                // Este ejemplo soporta navegadores antiguos
                if (window.XMLHttpRequest) {
                    // código para IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // código para IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selProvincia").innerHTML = this.responseText;
                        document.getElementById("selProvincia").disabled = false;
                    }
                };
                xmlhttp.open("GET", "ejemplo2servidorprovincias.php?id=" + idComunidad, true);
                xmlhttp.send();
            }
        }

        function actualizaMunicipios(idProvincia) {
            if (idProvincia == "") {
                document.getElementById("selMunicipio").innerHTML = "";
                document.getElementById("selMunicipio").disabled = true;
                return;
            } else {
                // Este ejemplo soporta navegadores antiguos
                if (window.XMLHttpRequest) {
                    // código para IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // código para IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selMunicipio").innerHTML = this.responseText;
                        document.getElementById("selMunicipio").disabled = false;
                    }
                };
                xmlhttp.open("GET", "ejemplo2servidormunicipios.php?id=" + idProvincia, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>

    <form>
        <label>Comunidad</label>
        <select name="selComunidad" onchange="actualizaProvincias(this.value)">
            <option value="">Seleccione...</option> <!-- Opción vacía -->
            <?php
            $resultado = $bd->query('SELECT id, comunidad FROM comunidades ORDER BY comunidad ASC');
            while ($comunidad = $resultado->fetch()) {
                echo '<option value="' . $comunidad['id'] . '">' . $comunidad['comunidad'] . '</option>';
            }
            ?>
        </select>
        <label>Provincia</label>
        <select id="selProvincia" onchange="actualizaMunicipios(this.value)" disabled></select>
        <label>Municipio</label>
        <select id="selMunicipio" disabled></select>
    </form>
</body>

</html>
// ejemplo4.js
function mostrarProducto(str) {
    if (str.length == 0) {
        document.getElementById("spnNombre").innerHTML = "";
        document.getElementById("spnDescripcion").innerHTML = "";
        document.getElementById("spnPrecio").innerHTML = "";
        document.getElementById("ficha").style.display = "none";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var xmlDoc = this.responseXML;
                document.getElementById("spnNombre").innerHTML =
                    xmlDoc.getElementsByTagName("nombre")[0].childNodes[0].nodeValue;
                document.getElementById("spnDescripcion").innerHTML =
                    xmlDoc.getElementsByTagName("descripcion")[0].childNodes[0].nodeValue;
                document.getElementById("spnPrecio").innerHTML =
                    xmlDoc.getElementsByTagName("precio")[0].childNodes[0].nodeValue;
                document.getElementById("ficha").style.display = "block";
            }
        };
        xmlhttp.open("GET", "ejemplo4servidortienda.php?q=" + str, true);
        xmlhttp.send();
    }
}
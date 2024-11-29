function mostrarHoras(str) {
    if (str.length == 0) {
        document.getElementById("horas").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var xmlDoc = this.responseXML;
                document.getElementById("horas").innerHTML = "Horas: " + xmlDoc.getElementsByTagName("horas")[0].childNodes[0].nodeValue;
            }
        };
        xmlhttp.open("GET", "ejerciciofpservidor.php?q=" + str, true);
        xmlhttp.send();
    }
}
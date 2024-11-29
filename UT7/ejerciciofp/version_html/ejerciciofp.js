function mostrarHoras(str) {
    if (str.length == 0) {
        document.getElementById("contHoras").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("contHoras").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ejerciciofpservidor.php?q=" + str, true);
        xmlhttp.send();
    }
}
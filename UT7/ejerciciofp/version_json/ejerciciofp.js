function mostrarHoras(str) {
    if (str.length == 0) {
        document.getElementById("horas").innerHTML = "";
        return;
    } else {
        fetch('ejerciciofpservidor.php?q=' + str).then(function (response) {
            return response.json();
        }).then(function (modulo) {
            document.getElementById("horas").innerHTML = "Horas: " + modulo.numeroHorasSemanales;
        });
    }
}
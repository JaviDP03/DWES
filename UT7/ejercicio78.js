function mostrarProducto(str) {
    if (str.length == 0) {
        document.getElementById("spnNombre").innerHTML = "";
        document.getElementById("spnDescripcion").innerHTML = "";
        document.getElementById("spnPrecio").innerHTML = "";
        document.getElementById("ficha").style.display = "none";
        return;
    } else {
        fetch('ejercicio78servidor.php?q=' + str).then(function (response) {
            // Convertimos a JSON
            return response.json();
        }).then(function (producto) {
            document.getElementById("spnNombre").innerHTML = producto.nombre_corto;
            document.getElementById("spnDescripcion").innerHTML = producto.descripcion;
            document.getElementById("spnPrecio").innerHTML = producto.PVP;
            document.getElementById("ficha").style.display = "block";
        });
    }
}
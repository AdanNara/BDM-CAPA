//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

document.addEventListener("DOMContentLoaded", function() {
    
    const rows = document.querySelectorAll('tr.fila-reporte'); 

    rows.forEach(function(row) {
        row.addEventListener("click", function() {
            
            const id = row.getAttribute("data-id");
            const accion = row.getAttribute("data-accion");

            let filtro = ""

            if(accion === "1"){
                filtro = "por videojuego"
            }
            else if(accion === "2"){
                filtro = "por usuario"
            }
            
            window.location.href = "/home?ID=" + id + "&ACCION=" + accion + "&Nombre=" + filtro;
        });
    });
});
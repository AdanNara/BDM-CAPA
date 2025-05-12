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
            const nombre = row.getAttribute("data-nombre");
            
            window.location.href = "/home?ID=" + id + "&ACCION=" + accion + "&Nombre=" + nombre;
        });
    });
});
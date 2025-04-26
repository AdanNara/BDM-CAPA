
//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});


window.onload = function() {
    fetch("src/api/getVideojuegos.php?accion=1")
    .then(response => response.json())
    .then(data => {
        if(data.status == "SUCCESS"){
            let gamecard = "";

            data.data.forEach(caratula => {
                gamecard += `<div class="game-card" data-ID="${caratula.ID}" data-Nombre="${caratula.Nombre}"> 
                <img src="${caratula.URL}" alt="imagen juego 1">
                <p>${caratula.Nombre}</p>
                </div>`;
            });
            
            document.getElementById("gamecard-contenedor").innerHTML = gamecard;
        }

    })
    .catch(error => 
        alert("ERROR: " + error)
    );

}

//SELECCIONAR VIDEOJUEGO Y PASAR A INICIO FILTRADO
document.addEventListener("DOMContentLoaded", function() {
    
    document.body.addEventListener("click", function(e) {
        if (e.target.closest(".game-card")) {
            const gameId = e.target.closest(".game-card").getAttribute("data-ID");
            const gameName = e.target.closest(".game-card").getAttribute("data-Nombre");
            window.location.href = "/home?ID=" + gameId + "&Nombre=" + gameName;
        }
    });
    
});

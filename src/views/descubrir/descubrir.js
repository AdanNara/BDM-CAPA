
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
                gamecard += `<div class="game-card" data-ID="${caratula.ID}"> 
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
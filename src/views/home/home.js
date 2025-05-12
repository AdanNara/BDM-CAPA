//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

/*
if (window.history.replaceState) {
    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    window.history.replaceState({}, document.title, cleanUrl);
}
    */

document.querySelectorAll(".formVotes").forEach(function(publi) {

    publi.addEventListener("submit", function(event) {  

        event.preventDefault();

        const upvote = publi.querySelector('#upvoteButton');
        const downvote = publi.querySelector('#downvoteButton');

        const ratingDiv = publi.querySelector('.rating');
        let currentRating = parseInt(ratingDiv.textContent.trim());
    
        var id = publi.getAttribute("data-ID");
        
        if(publi.dataset.voted == "YES"){
            alert("Ya has votado");
            return;
        }

        const boton = event.submitter;

        if(boton && boton.id =="upvoteButton"){
            alert("Has votado a favor" + id);
            currentRating += 1;
            fetch('src/controllers/votos.php?accion=1&id='+id);

        }else if(boton && boton.id=="downvoteButton"){
            alert("Has votado en contra" + id);
            currentRating -= 1;
            fetch('src/controllers/votos.php?accion=2&id='+id);
        }

        ratingDiv.textContent = currentRating;
        upvote.disabled = true;
        downvote.disabled = true;

        publi.dataset.voted = "YES";
    });

});

document.addEventListener("DOMContentLoaded", function() {
    document.body.addEventListener("click", function(e) {
        const target = e.target.closest(".category-name");
        if (target) {
            const categoriaId = target.getAttribute("data-categoria");
            const categoriaNombre = target.getAttribute("data-nombre");
            window.location.href = "/home?ID=" + encodeURIComponent(categoriaId) + "&Nombre=" + encodeURIComponent(categoriaNombre);
        }
    });
});
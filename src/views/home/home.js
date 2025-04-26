//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

if (window.history.replaceState) {
    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    window.history.replaceState({}, document.title, cleanUrl);
}
//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

var usuarioSeleccionado = false;
let usuarioNombre = null
let usuarioUsername = null

var intervaloMensaje = null;

let chat = document.getElementById("cont-chat");

function obtenerMensajes(){
    fetch(`src/controllers/obtenerMensaje.php?destinatario=${usuarioUsername}`)
    .then(response => response.json())
    .then(data =>{
        console.log("JSON recibido:", data);

        chat.innerHTML = "";
        
        data.forEach(mensaje=>{
            let clase = mensaje.destinatario == usuarioUsername ? "Yo" : "Otro";

            let mensajeHTML;

            if(clase == "Yo"){
            mensajeHTML = `
            <div class="msj-Yo"> 
                <p class="${clase}">Yo: </p> 
                <p class="texto-msj"> ${mensaje.mensaje}</p>
            </div> `;
            }else{
            mensajeHTML = `
            <div class="msj-Otro"> 
                <p class="${clase}">${usuarioUsername}: </p> 
                <p class="texto-msj">${mensaje.mensaje}</p>
            </div> `;
            }

            chat.innerHTML += mensajeHTML;
        });

        chat.scrollTop = chat.scrollHeight;

    })
    
    .catch(error => {
        console.log(error);
    });

}

//Para enviar mensajes
document.getElementById("formulario-input").addEventListener("submit", function(event){

    event.preventDefault();

    let mensaje = document.getElementById("in-texto").value;
    if(mensaje == ""){
        alert("No puedes enviar un mensaje vacío");
        return;
    }

    if(usuarioSeleccionado){
        fetch(`src/controllers/enviarMensaje.php`, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `destinatario=${(usuarioUsername)}&mensaje=${encodeURIComponent(mensaje)}`
         })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
            document.getElementById("in-texto").value = ""; 

        } else {
           alert("Error al enviar mensaje:", data.error);
        }
      });
    }
});


// Se obtienen los mensajes al seleccionar un contacto
document.querySelectorAll(".contacto").forEach(function(contacto) {

    contacto.addEventListener("click", function() {

        usuarioSeleccionado = true;
        usuarioNombre = contacto.getAttribute("data-nombre");
        usuarioUsername = contacto.getAttribute("data-username");
        
        document.getElementById("nom-usu-Chat").innerHTML = usuarioNombre + " (" + usuarioUsername + ")";

        chat.innerHTML = "";
        
        if(intervaloMensaje){
            clearInterval(intervaloMensaje);
            obtenerMensajes();
        }

        intervaloMensaje = setInterval(obtenerMensajes, 1000);
        
    });

});
//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

var modificadoActivo = false;
var botonModificar = document.getElementById("modify-profile");
var botonGuardar = document.getElementById("save-profile");

function activarInputs(){

    var inputUsername = document.getElementById("in_username");
    var inputName = document.getElementById("in_fullname");
    var inputEmail = document.getElementById("in_email");
    var inputPassword = document.getElementById("in_password");
    

    if(inputUsername.disabled === false){
        inputUsername.disabled = true;
        inputName.disabled = true;
        inputEmail.disabled = true;
        inputPassword.disabled = true;

    }else{
        inputUsername.disabled = false;
        inputName.disabled = false;
        inputEmail.disabled = false;
        inputPassword.disabled = false; 

    }

}

botonModificar.onclick = function() {

    activarInputs();
    this.textContent = modificadoActivo ? "Modificar" : "Cancelar";
    botonGuardar.style.display = modificadoActivo ? "none" : "block";
    

    if(modificadoActivo) {
        modificadoActivo = false;
    }else{
        modificadoActivo = true;
    }

}



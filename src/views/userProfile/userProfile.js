//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

var modificadoActivo = false;
var botonModificar = document.getElementById("modify-profile");
var botonGuardar = document.getElementById("save-profile");
var inputUsername = document.getElementById("in_username");
var inputName = document.getElementById("in_fullname");
var inputEmail = document.getElementById("in_email");
var inputPassword = document.getElementById("in_password");

//VALORES INICIALES
var antUsername = document.getElementById("in_username").value;
var antName = document.getElementById("in_fullname").value;
var antEmail = document.getElementById("in_email").value;
var antPassword = document.getElementById("in_password").value;

function activarInputs(){

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
    inputPassword.type = modificadoActivo ? "password" : "text";

    if(modificadoActivo) {
        modificadoActivo = false;
        inputUsername.value = antUsername;
        inputName.value = antName;
        inputEmail.value = antEmail;
        inputPassword.value = antPassword;
    }else{
        modificadoActivo = true;
    }
}

document.getElementById("formulario-infousuario").addEventListener("submit", function(event){

    event.preventDefault();

    let nomUsuario = document.getElementById("in_username").value.trim();
    let nomCompleto = document.getElementById("in_fullname").value.trim();
    let correoE = document.getElementById("in_email").value.trim();
    let password = document.getElementById("in_password").value.trim();
   
    let usernameRegex = /^[a-z0-9]+$/; // Solo letras minúsculas y números
    let fullnameRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Solo letras y espacios
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Formato de email válido
    let passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/; // 8 caracteres mínimo, 1 mayúscula, 1 número

    let errors = [];

    if (!usernameRegex.test(nomUsuario)) {
        errors.push("El nombre de usuario solo puede contener letras minúsculas y números, sin espacios.");
    }
    if (!fullnameRegex.test(nomCompleto)) {
        errors.push("El nombre completo solo puede contener letras y espacios.");
    }
    if (!emailRegex.test(correoE)) {
        errors.push("El correo electrónico no tiene un formato válido.");
    }
    if (!passwordRegex.test(password)) {
        errors.push("La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.");
    }

    if (errors.length > 0) {
        alert(errors.join("\n")); // Muestra los errores en una alerta
    } else {
        alert("Información modificada correctamente.");
        this.submit(); // Enviar el formulario si todo está bien
    }

});


//CARGA DE LA IMAGEN DE PERFIL

var imagenCargada = false;

const imagenPerfil = document.getElementById("input-image");
const avatar = document.getElementById("avatar");
let salvarCambios = document.getElementById("salvarCambios");

imagenPerfil.addEventListener("change", function(event) {
    const archivo = event.target.files[0];

    if (archivo) {
        const lector = new FileReader();

        lector.onload = function(e) {
            avatar.src = e.target.result;
        };

        lector.readAsDataURL(archivo); 
        imagenCargada = true;
        salvarCambios.style.display = "inline-block"; 
    }
});

//GUARDAR LA IMAGEN DE PERFIL EN BASE DE DATOS
const formImagen = document.getElementById("imagen-form");

formImagen.addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData(formImagen);

    fetch("/subir-imagen", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) 
    .then(data => {
        alert("Imagen de perfil" + data);
        window.location.reload(); 
    })
    .catch(error => {
        console.error("Error al subir la imagen:", error);
    });  

});


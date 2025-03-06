
document.getElementById("formSingIn").addEventListener("submit", function(event){

    event.preventDefault();

    let nomUsuario = document.getElementById("in_username").value.trim();
    let nomCompleto = document.getElementById("in_nombre").value.trim();
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
        alert("Usuario creado correctamente.");
        this.submit(); // Enviar el formulario si todo está bien
    }

});

let botonGetUsers = document.getElementById("button-getUsuarios");

botonGetUsers.onclick = function () { 

    fetch("/apiGetUser")
    .then(response => response.json())
    .then(data => {
        if(data.status == "SUCCESS"){
            let listaHTML = "";

            data.data.forEach(usuario => {
                listaHTML += `<tr> 
                <td>${usuario.username}</td> 
                <td>${usuario.nombre}</td>
                <td>${usuario.correoE}</td>
                <td>${usuario.tipoUsuario}</td>
                </tr>`;
            });
            document.getElementById("tbody-lista").innerHTML = listaHTML;
        }

    })
    .catch(error => 
        alert("ERROR: " + error)
    );

};
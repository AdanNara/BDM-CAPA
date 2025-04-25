
let botonGetUsers = document.getElementById("button-getUsuarios");

botonGetUsers.onclick = function () { 

<<<<<<< HEAD
    fetch("src/api/getinfouser.php")
=======
    fetch("/apiGetUser")
>>>>>>> 3527e075ee81391b81da04cf23a0038658320190
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
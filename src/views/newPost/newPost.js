
//BUZON
document.getElementById("abrirBuzon").addEventListener("click",function(){

    window.location.href = "/reportar";

});

//Llenar select con videojuegos disponibles
window.onload = function(){
    fetch("src/api/getVideojuegos.php?accion=2")
    .then(response => response.json())
    .then(data => {
        if(data.status == "SUCCESS"){
            let optionJuego = "<option disabled selected>Selecciona una categoria</option>";

            data.data.forEach(opcion => {
                optionJuego += `<option value= ${opcion.ID}> 
                ${opcion.Nombre} 
                </option>`;
            });
            document.getElementById("categories-newPost").innerHTML = optionJuego;
        }

    })
    .catch(error => 
        alert("ERROR: " + error)
    );

}

//Mostrar imagen o video preview
const inputImage = document.getElementById("input-image");
const previewImage = document.getElementById("preview-image");
const previewVideo = document.getElementById("preview-video");
const botonesQuitarMedia = document.getElementById("botones-eliminar-media");

inputImage.addEventListener('change', () => {

    const file = inputImage.files[0];

    if (!file) return;

    previewImage.style.display = 'none';
    previewImage.style.display = 'none';

    const fileURL = URL.createObjectURL(file);

    if (file.type.startsWith('image/')) {
        previewImage.src = fileURL;
        previewImage.style.display = 'block';
    } else if (file.type === 'video/mp4') {
        previewVideo.src = fileURL;
        previewVideo.style.display = 'block';
    }

    const botonesSubirMedia = document.getElementById("botones-subir-media");
    botonesSubirMedia.style.display = 'none';

    botonesQuitarMedia.style.display = 'block';
});

botonesQuitarMedia.addEventListener('click', () => {
    inputImage.value = null;
    previewImage.style.display = 'none';
    previewVideo.style.display = 'none';

    const botonesSubirMedia = document.getElementById("botones-subir-media");
    botonesSubirMedia.style.display = 'block';

    botonesQuitarMedia.style.display = 'none';
});




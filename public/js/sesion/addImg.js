const img = document.querySelector("#addImg")

const cargarImagen=(event)=>{

    document.getElementById('boton').style.display = 'block';
    let archivos = event.target.files;

    if(archivos.length <= 1){
        let render = new FileReader()
        render.onload = function(){
            let imagenPrin = document.querySelector(".imgUser")
            imagenPrin.src = render.result
        }
        render.readAsDataURL(archivos[0])
    }
    
}

img.addEventListener("change",cargarImagen)

const form = document.querySelector(".formAgg")
const botonAvanzado = document.querySelector(".btn-avanzado-des")
const opc_avanzada = document.querySelector(".opc_avanzada")
const img_producto = document.querySelector(".img_producto")
const BotonEsconder = document.querySelector(".btn-avanzado-close")
const img = document.querySelector("#addImg")

botonAvanzado.addEventListener("click",()=>{
    opc_avanzada.classList.remove("ocultar")
    img_producto.classList.add("ocultar")
    botonAvanzado.classList.add("ocultar")
    
})

BotonEsconder.addEventListener("click",()=>{
    opc_avanzada.classList.add("ocultar")
    img_producto.classList.remove("ocultar")
    botonAvanzado.classList.remove("ocultar")
    
})

form.addEventListener("submit",(e)=>{
    e.preventDefault()
    const input= document.querySelectorAll(".confirmacion")
    // console.log(input)
    // const confir = Array.from(input).every(con =>con.value.trim() === "")
    let inputVacio = false
    for (let index = 0; index < input.length; index++) {
        if(input[index].value.trim()=== ""){
            console.log("esta vacio")
            inputVacio = true
            break
        }else{
            console.log(input[index].value)
        }
        
        
    }
    
    
    Swal.fire({
        icon: "question",
        title: "¿Quieres Guardar el producto?",
        showDenyButton: false,
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonText: "Guardar",
        cancelButtonText: "cancelar",
        confirmButtonColor: '#d99923',
        cancelButtonColor: "#343532",
        customClass: {
            popup: 'containerModal',
            title: 'containerModal',
            confirmButton: 'btnText btnConfirm',
            cancelButton: 'btnText btnCancel',
        }
    }).then((result) => {
        if(inputVacio){
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Fallo al guardar el producto",
                    text: "Corrobore todos los campos",
                    icon: "error",
                    customClass: {
                        popup: 'containerModal',
                        title: 'containerModal',
                    }
                })
                form.submit()
            }else{

            }
        }else{
            console.log("llena los campos perro")
            Swal.fire({
                title:"Guardado Correctamente",
                icon:"success",
                customClass: {
                    popup: 'containerModal',
                    title: 'containerModal',
                }
            })

            form.submit()
        }
        
    });
})

const cargarImagen=(event)=>{

    let archivos = event.target.files;
    let contenedor = document.querySelector(".imgs-agg")

    if(archivos.length <= 1){
        let render = new FileReader()
        render.onload = function(){
            let imagenPrin = document.querySelector(".img-principal")
            imagenPrin.src = render.result
        }
        render.readAsDataURL(archivos[0])


    }else{

        for (let index = 0; index < archivos.length; index++) {
        let render = new FileReader()
        render.onload = function(){
            let imagen = document.createElement("img");
            imagen.src = render.result;
            imagen.classList.add("img-mas");
            contenedor.appendChild(imagen);
        }
        render.readAsDataURL(archivos[index])
        
        }
    }
    
    
}

img.addEventListener("change",cargarImagen)
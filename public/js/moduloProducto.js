
const habilitarEdicion = document.querySelector("#habilitar")
const form = document.querySelector(".formin")
const btnAct = document.querySelector(".botonActualizar")
const btnElm = document.querySelector(".botonEliminar")
const img = document.querySelector("#addImg")


habilitarEdicion.addEventListener("change",()=>{
    const inputs = form.children
    const filtro = Array.from(inputs).filter((input) => input.classList.contains("ipt"))
    console.log(filtro)
    for (let index = 0; index < filtro.length; index++) {
        if (filtro[index].disabled) {
            filtro[index].disabled = false
            filtro[index].classList.remove("desactivate")
            filtro[index].classList.add("activate")
            
        } else {
            filtro[index].disabled = true
            filtro[index].classList.remove("activate")
            filtro[index].classList.add("desactivate")
        }
        
    }

    if (btnAct.disabled) {
        btnAct.disabled = false
        btnAct.classList.remove("btnDesact")
        btnAct.classList.add("btnText")
        btnAct.classList.add("btnConfirm")

        btnElm.disabled = false
        btnElm.classList.remove("btnDesact")
        btnElm.classList.add("btnText")
        btnElm.classList.add("btnConfirm")
    } else {
        btnAct.disabled = true
        btnAct.classList.remove("btnText")
        btnAct.classList.remove("btnConfirm")
        btnAct.classList.add("btnDesact")
        btnElm.disabled = true
        btnElm.classList.remove("btnText")
        btnElm.classList.remove("btnConfirm")
        btnElm.classList.add("btnDesact")
    }
    // (btnAct.disabled) ? btnAct.disabled = false : btnAct.disabled = true

})

form.addEventListener("submit",(e)=>{
    e.preventDefault()
    let empityInput = true
    console.log(empityInput)
    const input= document.querySelectorAll(".ipt")
    console.log(input)
    for (let index = 0; index < input.length; index++) {
        if(input[index].value.trim()=== ""){
            console.log("esta vacio")
            empityInput = false
            console.log(empityInput)
            break
        }else{
            console.log(input[index].value)
        }
        
        
    }
    // const confir = Array.from(input).every(con =>con.value === null)
    // console.log(confir)

    Swal.fire({
        icon: "question",
        title: "¿Quieres actualizar el producto?",
        showDenyButton: false,
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonText: "Actualizar",
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
        if(empityInput){
            if (result.isConfirmed) {
                Swal.fire({
                    title:"Actualizado Correctamente",
                    icon:"success",
                    customClass: {
                        popup: 'containerModal',
                        title: 'containerModal',
                    }
                });
                form.submit()
            }

        }else{
            Swal.fire({
                title: "Fallo al actualizar el producto",
                text: "Corrobore todos los campos",
                icon: "error",
                customClass: {
                    popup: 'containerModal',
                    title: 'containerModal',
                }
            })
            form.submit()
        }
        
    });
})

const handleClick =(e)=>{
    e.preventDefault()
    Swal.fire({
        icon: "warning",
        title: "¿Quieres eliminar el producto?",
        showDenyButton: false,
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonText: "Eliminar",
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
        if (result.isConfirmed) {
            Swal.fire({
                title:"Eliminado Correctamente",
                icon:"success",
                customClass: {
                    popup: 'containerModal',
                    title: 'containerModal',
                }
            });
            btnElm.removeEventListener("click", handleClick);
            // Simular un clic después de confirmar eliminación
            btnElm.click();
            
        
        }
    });
}

btnElm.addEventListener("click", handleClick);


const cargarImagen=(event)=>{
    let archivos = event.target.files;
    let contenedor = document.querySelector(".img-nuevas")
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

img.addEventListener("change",cargarImagen)

function addStarComun(){
    const vStarCal = document.getElementById('vStarCal');
    let constBoxStar = document.getElementById('constBoxStar');
    let element = parseFloat(vStarCal.value);;
    let star = '';
    if(element === 0){
        star = `<i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if(element <= 0.5){
        star = `<i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 1){
        star = `<i class='bx bxs-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 1.5){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 2){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 2.5){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 3){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 3.5){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 4){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bx-star' ></i>`
    }else if (element <= 4.5){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star-half' ></i>`
    }else if (element <= 5){
        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i>`
    }else{
        star = 'No hay nada';
    }
    constBoxStar.innerHTML = "Hola";
}

document.addEventListener('DOMContentLoaded', () => {
    addStarComun();
});
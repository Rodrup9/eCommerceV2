
const habilitarEdicion = document.querySelector("#habilitar")
const form = document.querySelector(".formin")
const btnAct = document.querySelector(".botonActualizar")
const btnElm = document.querySelector(".botonEliminar")



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



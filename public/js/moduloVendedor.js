

const botonAvanzado = document.querySelector(".btn-avanzado-des")
const opc_avanzada = document.querySelector(".opc_avanzada")
const img_producto = document.querySelector(".img_producto")
const BotonEsconder = document.querySelector(".btn-avanzado-close")

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
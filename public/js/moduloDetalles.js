
const iconArrow = document.getElementById('iconArrow');
const imgBigAbsolute = document.getElementById('imgBigAbsolute');
const imgBig = document.getElementById('imgBig');


function imgShowBox(value){
    if(value == 0){
        iconArrow.innerHTML = '<i class="bx bx-chevron-up" onclick="imgShowBox(1)"></i>';
        document.documentElement.style.setProperty(`--heightImg`, '242');
    }else{
        iconArrow.innerHTML = '<i class="bx bx-chevron-down" onclick="imgShowBox(0)"></i>';
        document.documentElement.style.setProperty(`--heightImg`, '70px');
    }
}

function showImgBig(value){
    imgBigAbsolute.style.display = 'flex';
    imgBig.src = value;
    document.body.style.overflow = 'hidden';
}

function closeShowImgBig(){
    imgBigAbsolute.style.display = 'none';
    document.body.style.overflow = 'auto';
}

/* ----------------- Generar estrellas -------------------------------------------------------------*/

const star1 = document.getElementById('star1');
const star2 = document.getElementById('star2');
const star3 = document.getElementById('star3');
const star4 = document.getElementById('star4');
const star5 = document.getElementById('star5');
let scoreAdd = document.getElementById('scoreAdd')

const star = [ star1, star2, star3, star4, star5];

star1.addEventListener('click', function(event) {
    const rect = star1.getBoundingClientRect();
    const mitadAncho = rect.width / 2;
    
    const posicionCursor = event.clientX - rect.left;
    
    if (posicionCursor < mitadAncho) {
        for(i = 0; i <= 4; i++){
            if(i == 0){
                if(star[i].classList.contains('bxs-star-half')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 0;
                    
                }else{
                    star[i].classList.add('bxs-star-half');
                    star[i].classList.remove('bx-star');
                    scoreAdd.value = 0.5;
                }
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    } else {
        for(i = 0; i <= 4; i++){
            if(i <= 0){
                if(i == 0  && star[i].classList.contains('bxs-star')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 0;
                }else{
                    star[i].classList.remove('bx-star');
                    star[i].classList.add('bxs-star');
                    star[i].classList.remove('bxs-star-half');
                    scoreAdd.value = 1;
                }
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    }
});


star2.addEventListener('click', function(event) {
    const rect = star2.getBoundingClientRect();
    const mitadAncho = rect.width / 2;
    
    const posicionCursor = event.clientX - rect.left;
    
    if (posicionCursor < mitadAncho) {
        for(i = 0; i <= 4; i++){
            if(i == 1){
                if(star[i].classList.contains('bxs-star-half')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 1;
                }else{
                    star[i].classList.add('bxs-star-half');
                    star[i].classList.remove('bx-star');
                    scoreAdd.value = 1.5;
                }
            }else if(i <= 1){
                star[i].classList.remove('bx-star');
                star[i].classList.add('bxs-star');
                star[i].classList.remove('bxs-star-half');
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    } else {
        for(i = 0; i <= 4; i++){
            if(i <= 1){
                if(i == 1  && star[i].classList.contains('bxs-star')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 1;
                }else{
                    star[i].classList.remove('bx-star');
                    star[i].classList.add('bxs-star');
                    star[i].classList.remove('bxs-star-half');
                    scoreAdd.value = 2;
                }
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    }
});

star3.addEventListener('click', function(event) {
    const rect = star3.getBoundingClientRect();
    const mitadAncho = rect.width / 2;
    
    const posicionCursor = event.clientX - rect.left;
    
    if (posicionCursor < mitadAncho) {
        for(i = 0; i <= 4; i++){
            if(i == 2){
                if(star[i].classList.contains('bxs-star-half')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 2;
                }else{
                    star[i].classList.add('bxs-star-half');
                    star[i].classList.remove('bx-star');
                    scoreAdd.value = 2.5;
                }
            }else if(i <= 2){
                star[i].classList.remove('bx-star');
                star[i].classList.add('bxs-star');
                star[i].classList.remove('bxs-star-half');
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    } else {
        for(i = 0; i <= 4; i++){
            if(i <= 2){
                if(i == 2  && star[i].classList.contains('bxs-star')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 2;
                }else{
                    star[i].classList.remove('bx-star');
                    star[i].classList.add('bxs-star');
                    star[i].classList.remove('bxs-star-half');
                    scoreAdd.value = 3;
                }
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    }
});

star4.addEventListener('click', function(event) {
    const rect = star4.getBoundingClientRect();
    const mitadAncho = rect.width / 2;
    
    const posicionCursor = event.clientX - rect.left;
    
    if (posicionCursor < mitadAncho) {
        for(i = 0; i <= 4; i++){
            if(i == 3){
                if(star[i].classList.contains('bxs-star-half')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 3;
                }else{
                    star[i].classList.add('bxs-star-half');
                    star[i].classList.remove('bx-star');
                    scoreAdd.value = 3.5;
                }
            }else if(i <= 3){
                star[i].classList.remove('bx-star');
                star[i].classList.add('bxs-star');
                star[i].classList.remove('bxs-star-half');
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    } else {
        for(i = 0; i <= 4; i++){
            if(i <= 3){
                if(i == 3  && star[i].classList.contains('bxs-star')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 3;
                }else{
                    star[i].classList.remove('bx-star');
                    star[i].classList.add('bxs-star');
                    star[i].classList.remove('bxs-star-half');
                    scoreAdd.value = 4;
                }
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    }
});

star5.addEventListener('click', function(event) {
    const rect = star5.getBoundingClientRect();
    const mitadAncho = rect.width / 2;
    
    const posicionCursor = event.clientX - rect.left;
    
    if (posicionCursor < mitadAncho) {
        for(i = 0; i <= 4; i++){
            if(i == 4){
                if(star[i].classList.contains('bxs-star-half')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 4;
                }else{
                    star[i].classList.add('bxs-star-half');
                    star[i].classList.remove('bx-star');
                    scoreAdd.value = 4.5;
                }
            }else if(i <= 4){
                star[i].classList.remove('bx-star');
                star[i].classList.add('bxs-star');
                star[i].classList.remove('bxs-star-half');
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    } else {
        for(i = 0; i <= 4; i++){
            if(i <= 4){
                if(i == 4  && star[i].classList.contains('bxs-star')){
                    star[i].classList.remove('bxs-star-half');
                    star[i].classList.add('bx-star');
                    star[i].classList.remove('bxs-star');
                    scoreAdd.value = 4;
                }else{
                    star[i].classList.remove('bx-star');
                    star[i].classList.add('bxs-star');
                    star[i].classList.remove('bxs-star-half');
                    scoreAdd.value = 5;
                }
            }else{
                star[i].classList.remove('bxs-star-half');
                star[i].classList.remove('bxs-star');
                star[i].classList.add('bx-star');
            }
        }
    }
});

/* -------------------------------- Añadir producto sin ir ------------------------------*/

function addCart(go) {
    let idProductoCart = document.getElementById('idProductoCart').value;
    let NameProductoCart = document.getElementById('NameProductoCart').value;
    let CountProductoCart = document.getElementById('CountProductoCart').value;
    let PriceProductoCart = document.getElementById('PriceProductoCart').value;
    let urlProductCart = document.getElementById('urlProductCart').value;

    let cartProduct = localStorage.getItem('cart');
    if (cartProduct) {
        let cartArray = JSON.parse(cartProduct);
        let existingProduct = cartArray.find(item => item.id == idProductoCart);

        if (!existingProduct) {
            // Producto no existe en el carrito, agregar como nuevo
            let newPrice = parseFloat(PriceProductoCart) * parseInt(CountProductoCart);
            cartArray.push({
                'id': idProductoCart,
                'name': NameProductoCart,
                'count': CountProductoCart,
                'priceOrigin': PriceProductoCart, 
                'price': newPrice,
                'url': urlProductCart
            });
        } else {
            // Producto existe en el carrito, verificar y actualizar si es necesario
            if (existingProduct.count != CountProductoCart) {
                // Calcular la nueva cantidad y nuevo precio
                let newCountCount = parseInt(existingProduct.count) + parseInt(CountProductoCart);
                let newPrice = parseFloat(existingProduct.price) * newCountCount;

                // Actualizar la cantidad y precio del producto existente en el carrito
                existingProduct.count = newCountCount;
                existingProduct.price = newPrice;
            }
        }

        // Guardar el carrito actualizado en localStorage
        localStorage.setItem('cart', JSON.stringify(cartArray));
    } else {
        // No hay productos en el carrito, crear un nuevo carrito con el producto actual
        let newPrice = parseFloat(PriceProductoCart) * parseInt(CountProductoCart);
        let cartArray = [{
            'id': idProductoCart,
            'name': NameProductoCart,
            'count': CountProductoCart,
            'priceOrigin': PriceProductoCart,
            'price': newPrice,
            'url': urlProductCart
        }];

        // Guardar el carrito en localStorage
        localStorage.setItem('cart', JSON.stringify(cartArray));
    }
    if(go){
        let btnComprarAhora = document.getElementById('btnComprarAhora');
        btnComprarAhora.click();
    }
}

function addRecientes() {
    let idProducto = document.getElementById('idProducto').value;
    let recientes = localStorage.getItem('recientes');

    if (recientes) {
        // Parseamos la cadena JSON almacenada en localStorage a un array
        recientes = JSON.parse(recientes);

        // Verificamos si el producto ya existe en el array de recientes
        let index = recientes.indexOf(idProducto);

        if (index !== -1) {
            // Si el producto existe, lo eliminamos del array
            recientes.splice(index, 1);
        }

        // Agregamos el producto al final del array de recientes
        recientes.push(idProducto);

        // Si hay más de 10 elementos, eliminamos el primero (el más antiguo)
        if (recientes.length > 15) {
            recientes.shift(); // Elimina el primer elemento
        }

        // Convertimos de nuevo el array a JSON y lo guardamos en localStorage
        localStorage.setItem('recientes', JSON.stringify(recientes));
    } else {
        // Si no hay ningún valor en localStorage para 'recientes', creamos un nuevo array con el producto actual
        localStorage.setItem('recientes', JSON.stringify([idProducto]));
    }
}

addRecientes();
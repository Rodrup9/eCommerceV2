const productsCart = document.getElementById('productsCart');

function showProductsCart(){
    let arrayProducts = localStorage.getItem('cart');
    const goPay = document.getElementById('goPay');
    arrayProducts = JSON.parse(arrayProducts);
    if(arrayProducts[0]){
        goPay.disabled = false;
        let listProducts = ''
        arrayProducts.forEach(element => {
          listProducts += `
            <div class="productCart">
                <input type="checkbox" class="inputCheck" name="" id="">
                <img src="${element.url}" alt="${element.name}">
                <p>${element.name}</p>
                <input type="number" class="cantidad" value="${element.count}" name="${element.id}" id="">
                <input type="hidden" class="id" value="${element.id}" name="${element.id}" id="">
                <span>${element.price}</span>
                <i onclick='removeProducto(${element.id})' class='bx bx-trash bxMy'></i>
            </div>
          `  
        });
        productsCart.innerHTML = listProducts;
    }else{
        productsCart.innerHTML = 'No hay nada, añada articulos a su carrito'
        goPay.disabled = true;
    }
}

window.addEventListener('storage', (event) => {
    if (event.key === 'cart') {
        showProductsCart();
    }
});

const inputs = document.querySelectorAll('.cantidad');

inputs.forEach((input) => {
    input.addEventListener('input', (event) => {
        const valorActual = event.target.value;
        const productId = event.target.name; // Nombre del input debe ser el ID del producto

        let arrayProducts = localStorage.getItem('cart');
        if (arrayProducts) {
            arrayProducts = JSON.parse(arrayProducts);

            // Encuentra el producto en el carrito por su ID
            let producto = arrayProducts.find(item => item.id == productId);

            if (producto) {
                // Actualiza la cantidad y el precio del producto
                let newCount = parseInt(valorActual); // Convierte a entero
                let newPrice = parseFloat(producto.priceOrigin) * newCount;

                producto.count = newCount;
                producto.price = newPrice;

                // Guarda el arreglo actualizado en localStorage
                localStorage.setItem('cart', JSON.stringify(arrayProducts));

                // Opcional: Puedes mostrar un mensaje de confirmación o actualizar la interfaz aquí
                console.log('Producto actualizado:', producto);
            } else {
                console.log(`Producto con ID ${productId} no encontrado en el carrito.`);
            }
        } else {
            console.log('No hay productos en el carrito almacenados en localStorage.');
        }
    });
});

//setInterval(showProductsCart, 1000);

showProductsCart();

function removeProducto(id) {
    let arrayProducts = localStorage.getItem('cart');

    if (arrayProducts) {
        arrayProducts = JSON.parse(arrayProducts);

        // Encuentra el índice del producto con el ID dado
        let index = arrayProducts.findIndex(item => item.id == id);

        if (index !== -1) {
            // Utiliza splice() con el índice para eliminar el elemento del arreglo
            arrayProducts.splice(index, 1);

            // Guarda el arreglo actualizado de productos en localStorage
            localStorage.setItem('cart', JSON.stringify(arrayProducts));

            // Actualiza la visualización de los productos en el carrito
            showProductsCart();
        } else {
            console.log(`Producto con ID ${id} no encontrado en el carrito.`);
        }
    } else {
        console.log('No hay productos en el carrito almacenados en localStorage.');
    }
}

function pagar(){
    let productos = document.querySelectorAll('.productCart');
    let listCheck = [];
    let data = document.getElementById('data');
    let goPay = document.getElementById('goPay');
    productos.forEach((product, index) => {
        let input = product.querySelector('.inputCheck');
        if (input.checked) {
            let cantidad = product.querySelector('.cantidad').value;
            let id =product.querySelector('.id').value;
            listCheck.push({
                'id': id,
                'cantidad': cantidad
            });
        }
    })
    //let productosQuery = listCheck.map(item => `cantidad=${item[0]}&id=${item[1]}`).join('&');
    data.value = JSON.stringify(listCheck);
    goPay.click();
}

function payPay(){
    let paying = document.getElementById('paying');
    const inputs = document.querySelectorAll('.inValue');
    let storage = JSON.parse(localStorage.getItem('cart'))
    inputs.forEach(input => {  
        const nombreInput = input.getAttribute('name');
        storage = storage.filter(obj => obj.id !== nombreInput);
    });
    localStorage.setItem('cart' ,JSON.stringify(storage));
    paying.click();
}
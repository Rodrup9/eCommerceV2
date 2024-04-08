const productsCart = document.getElementById('productsCart');

function showProductsCart(){
    let arrayProducts = localStorage.getItem('cart');
    if(arrayProducts){
        arrayProducts = JSON.parse(arrayProducts);
        let listProducts = ''
        arrayProducts.forEach(element => {
          listProducts += `
            <div class="productCart">
                <input type="checkbox" name="" id="">
                <img src="${element.url}" alt="${element.name}">
                <p>${element.name}</p>
                <input type="number" class="cantidad" value="${element.count}" name="${element.id}" id="">
                <span>${element.price}</span>
                <i onclick='removeProducto(${element.id})' class='bx bx-trash bxMy'></i>
            </div>
          `  
        });
        productsCart.innerHTML = listProducts;
    }else{
        productsCart.innerHTML = 'No hay nada'
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
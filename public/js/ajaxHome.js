const sections = [
    {
        "name": "Busquedas recientes",
        "url": "null/recientes"
    },
    {
        "name": "Sugerencias",
        "url": "null/sugerencias"
    },
    {
        "name": "Tendencias",
        "url": "null/tendencias"
    },
    {
        "name": "Ofertas",
        "url": "null/descuentos"
    }
];

const insertarOfertas = document.getElementById('insertarOfertas');
const slidersBoxsInsert = document.getElementById('slidersBoxsInsert');
const boxOfertas = document.getElementById('boxOfertas');

function actualizarDatos() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', `/homeUpdate`, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);
            console.log('Producto Slider' , response[1].length)
            let max = response[1];
            if(xhr){
                let arrayOfertas = '';
                response[0].forEach(item => {
                    arrayOfertas += `
                        <div class="ofertaPanel">
                            <img src="${item.url}" alt="" onclick="showOfert('${item.position}')">
                            <a  href="/detalles/${item.producto_id}/${item.nombre}" class="ofertaOptionExpandir2">
                                <i class='bx bx-log-in-circle'></i>
                            </a>
                            <span class="${item.position}">
                                <p class="nombreP">${item.nombre}</p>
                                <p class="idP">${item.producto_id}</p>
                                <p class="desP">${item.descripcion}</p>
                                <p class="preP">${item.precio}</p>
                                <p class="ofertaP">${item.oferta}</p>
                                <p class="preAnteP">${item.precio_ante}</p>
                                <p class="imgP">${item.url}</p>
                                <p class="nombreSC">${item.nombreSubCategoria}</p>
                            </span>
                        </div>
                    `;
                })
                let divSlider = '';
                sections.forEach(set => {
                    let array = '';
                    response[1].forEach((item, index)=> {
                        if(index === 0){
                            divSlider += `
                                <section class="section sectionSlider">
                                    <div class="tittle"><p>${set.name}</p> <a class="verMas" href="catalogo/${set.url}">Ver más</a></div>
                                    <div class="boxProductos">
                                        <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
                                            <i class='bx bxs-chevron-left arrowIcon'></i>
                                        </div>
                                        <div id="sliderBox" class="sliderBox sliderProductos">
                                            <div id="slider" class="slider sliderBoxProductos">
                            `;
                        }

                        if(item.oferta == 0){
                            precio = `<p class="precio">${item.precio}</p>`
                        }else{
                            precio = `
                                <p class="precio">De <span class="precioActivo">${item.precio}}</span></p>
                                <p>a <span class="descuento">${item.oferta}</span></p>
                            `;
                        }
                        array += `
                        <a href="/detalles/${item.producto_id}/${item.nombre}" class="card producto">
                            <div class="imgProducto">
                                <img src="${item.img}" alt="${item.nombre}">
                            </div>
                            <div class="detalles">
                                <div class="moreDetalles">
                                    <div class="tag">
                                        <p>${item.oferta}</p>
                                    </div>
                                    <div class="iconOption">
                                        <i class='bx bx-heart iconoCard'></i>
                                    </div>
                                </div>
                                <div class="priceDes">
                                    ${precio}
                                </div>
                                <p class="nameProduct">${item.nombre}</p>
                                <p class="descripcion">${item.descripcion}</p>
                            </div>
                        </a>
                        `;
                        if(index == response[1].length -1){
                            console.log('termino')
                            divSlider += array
                            divSlider += `
                                        </div>
                                        </div>
                                        <div id="arrowSliderRight" class="arrowSliderRight arrow">
                                            <i class='bx bxs-chevron-right arrowIcon'></i>
                                        </div>
                                    </div>
                                </section>
                            `;
                        }else{
                            console.log('no entra')
                        }
                    })
                });
                insertarOfertas.innerHTML = arrayOfertas;
                insertarOfertas.insertAdjacentHTML('afterend', divSlider);
            }else{
                console.log('Respuesta del servidor:', response.mensaje);
            }
        } else {
            console.error('Error al actualizar los datos:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Error de red al actualizar los datos.');
    };

    xhr.send();
}
setInterval(actualizarDatos, 5000);
actualizarDatos()

function actualizarDatosSliders() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', `/homeUpdate`, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);
            console.log('Producto Slider' , response[1].length)
            let max = response[1];
            if(xhr){
                let divSlider = '';
                sections.forEach(set => {
                    let array = '';
                    response[1].forEach((item, index)=> {
                        if(index === 0){
                            divSlider += `
                                <section class="section sectionSlider">
                                    <div class="tittle"><p>${set.name}</p> <a class="verMas" href="catalogo/${set.url}">Ver más</a></div>
                                    <div class="boxProductos">
                                        <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
                                            <i class='bx bxs-chevron-left arrowIcon'></i>
                                        </div>
                                        <div id="sliderBox" class="sliderBox sliderProductos">
                                            <div id="slider" class="slider sliderBoxProductos">
                            `;
                        }

                        if(item.oferta == 0){
                            precio = `<p class="precio">${item.precio}</p>`
                        }else{
                            precio = `
                                <p class="precio">De <span class="precioActivo">${item.precio}}</span></p>
                                <p>a <span class="descuento">${item.oferta}</span></p>
                            `;
                        }
                        array += `
                        <a href="/detalles/${item.producto_id}/${item.nombre}" class="card producto">
                            <div class="imgProducto">
                                <img src="${item.img}" alt="${item.nombre}">
                            </div>
                            <div class="detalles">
                                <div class="moreDetalles">
                                    <div class="tag">
                                        <p>${item.oferta}</p>
                                    </div>
                                    <div class="iconOption">
                                        <i class='bx bx-heart iconoCard'></i>
                                    </div>
                                </div>
                                <div class="priceDes">
                                    ${precio}
                                </div>
                                <p class="nameProduct">${item.nombre}</p>
                                <p class="descripcion">${item.descripcion}</p>
                            </div>
                        </a>
                        `;
                        if(index == response[1].length -1){
                            console.log('termino')
                            divSlider += array
                            divSlider += `
                                        </div>
                                        </div>
                                        <div id="arrowSliderRight" class="arrowSliderRight arrow">
                                            <i class='bx bxs-chevron-right arrowIcon'></i>
                                        </div>
                                    </div>
                                </section>
                            `;
                        }else{
                            console.log('no entra')
                        }
                    })
                });
                insertarOfertas.innerHTML = arrayOfertas;
                insertarOfertas.insertAdjacentHTML('afterend', divSlider);
            }else{
                console.log('Respuesta del servidor:', response.mensaje);
            }
        } else {
            console.error('Error al actualizar los datos:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Error de red al actualizar los datos.');
    };

    xhr.send();
}
setInterval(actualizarDatosSliders, 5000);
actualizarDatosSliders()

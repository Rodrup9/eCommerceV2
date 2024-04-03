function actualizarDatos() {
    let prodcutoId = document.getElementById('prodcutoId').value;
    var xhr = new XMLHttpRequest();

    xhr.open('GET', `/actualizarDatos/${prodcutoId}`, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            let array = ``;
            let star = ``;
            if(xhr){
                let response = JSON.parse(xhr.responseText);
                response.forEach(element => {
                    if(element.calificacion === 0){
                        star = `<i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if(element.calificacion === 0.5){
                        star = `<i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 1){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 1.5){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 2){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 2.5){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 3){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bx-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 3.5){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star-half' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 4){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bx-star' ></i>`
                    }else if (element.calificacion === 4.5){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star-half' ></i>`
                    }else if (element.calificacion === 5){
                        star = `<i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> </i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i> <i class='bx bxs-star' ></i>`
                    }
                    array += `
                        <div class="cardComentarioComponent">
                            <div class="UserAndScore">
                                <p class="userNameUser">${element.user_id}</p>
                                <div class="scoreIcons">${star}</div>
                            </div>
                            <p class="comentarioText">${element.descripcion}</p>
                        </div>
                    `
                });
                document.getElementById('boxComentarios').innerHTML = `
                <h2>Comentarios</h2>
                ${array}
                `;
            }else{
                document.getElementById('boxComentarios').innerHTML = `
                    <div class="sinComentarios">
                        <h3>No hay comentarios para esté producto</h3>
                        <p>Se él primero en calificar este producto</p>
                    </div>`
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

// Llamar a la función para actualizar los datos cada X segundos
setInterval(actualizarDatos, 5000); // Actualizar cada 5 segundos (5000 milisegundos)
actualizarDatos()


/* ------------------------------------*/

function addComentarioUser() {
    let prodcutoId = document.getElementById('prodcutoId').value;
    let comentarioText = document.getElementById('cAdd').value;
    let scoreAdd = document.getElementById('scoreAdd').value;
    //let userId = document.getElementById('userId').value;

    var xhr = new XMLHttpRequest();

    xhr.open('POST', `/addComentarioUser`, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            comentarioText.value = '';
            scoreAdd.value = 0;
            console.log('Hecho')
        } else {
            console.error('Error al actualizar los datos:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Error de red al actualizar los datos.');
    };

    const datos = JSON.stringify({ 
        producto_id: prodcutoId, 
        descripcion: comentarioText,
        calificacion: scoreAdd,
        //user_id: userId
    });
    console.log(datos)
    xhr.send(datos);
};
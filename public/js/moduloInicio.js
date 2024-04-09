/*
const designCard = {
    designOne: [

    ],

    designTwo: [

    ]
}*/

let flexColumn = document.getElementById('flexColumn');
let flexRow = document.getElementById('flexRow');

function layoutViewChange(value) {
    if(value){
        //column
        document.documentElement.style.setProperty('--widthComponentCardOnly', '288px')
        document.documentElement.style.setProperty('--cardDirectionFlex', 'column')
        document.documentElement.style.setProperty('--cardGapDetalles', '2px')
        flexColumn.classList.add('iconActivate')
        flexRow.classList.remove('iconActivate')
        
        
        //console.log(value)
    }else{
        //row
        document.documentElement.style.setProperty('--widthComponentCardOnly', '100%')
        document.documentElement.style.setProperty('--cardDirectionFlex', 'row')
        document.documentElement.style.setProperty('--cardGapDetalles', '6px')
        flexColumn.classList.remove('iconActivate')
        flexRow.classList.add('iconActivate');
        //console.log(value)
    }

}

/* ShowOfert */

function showOfert(oferta){
    let ofertaNum = document.querySelector('.' + oferta);
    let padre = ofertaNum.parentNode;
    let nombreP = document.getElementById('nombreP');
    let desP = document.getElementById('desP');
    let ofertaP = document.getElementById('ofertaP');
    let preAnteP = document.getElementById('precioAnteP');
    let preP = document.getElementById('precioP');
    let buttomP = document.getElementById('buttomP');
    let imgCheck = document.getElementById('imgCheck');
    let nSubC = document.getElementById('nSubC');
    let lista = {};
    if(ofertaNum){
        let data = ofertaNum.querySelectorAll('.nombreP, .idP, .desP, .preP, .ofertaP, .preAnteP, .imgP, .nombreSC' )
        data.forEach(function(elemento) {
            if(elemento){
                lista[elemento.classList[0]] = elemento.textContent.trim();
            }else{
                lista[elemento.classList[0]] ="";
            }
          });
        idP = ""
        imgP = ""
        nombreP.innerHTML = lista.nombreP;
        desP.innerHTML = lista.desP;
        ofertaP.innerHTML = lista.ofertaP;
        preAnteP.innerHTML = lista.preAnteP;
        preP.innerHTML = lista.preP;
        buttomP.href  = "/detalles/" + lista.idP + "/" + lista.nombreP;
        imgCheck.src  = lista.imgP;
        nSubC.innerHTML = lista.nombreSC;
        let padres = document.querySelectorAll('.ofertaPanel')
        for (let i = 0; i < padres.length; i++) {
            padres[i].classList.remove('ofertaPanelActivate');
          }
        padre.classList.add('ofertaPanelActivate');
    }else{
        desP.innerText = "Ups, Parece que hubo un error";
    }
}

showOfert("oferta1")
let count = 2;


setInterval(function() {
    if (count <= 5) {
        const oferta = "oferta" + count;
        showOfert(oferta);
        count++;
        } else {
        count = 1;
        }
}, 6000);
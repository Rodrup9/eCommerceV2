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
let desc = document.getElementById ('desc')
let esp = document.getElementById ('esp')
let btnD = document.getElementById ('btnD')
let btnE = document.getElementById ('btnE')

function mostradesc (){
        desc.classList.remove('some');
        esp.classList.remove('aparece');
        btnD.classList.remove('Ncor');
        btnE.classList.remove('cor');
}

function mostraesp (){
    if (!desc.classList.contains('some')){
        desc.classList.add('some');
        esp.classList.add('aparece');
        btnD.classList.add('Ncor');
        btnE.classList.add('cor');
    }
}
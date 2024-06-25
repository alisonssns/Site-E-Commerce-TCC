let btn1 = document.getElementById ('btn1')
let btn2 = document.getElementById ('btn2')
let btn3 = document.getElementById ('btn3')
let btn4 = document.getElementById ('btn4')
let conta = document.getElementById ('conta')
let seg = document.getElementById ('seg')
let end = document.getElementById ('end')
let ped = document.getElementById ('ped')

conta.addEventListener ('change', () =>{
    btn1.classList.remove ('some');
    btn3.classList.remove ('cor');
    btn2.classList.remove ('cor');
    btn4.classList.remove ('cor');
})

seg.addEventListener ('change', () =>{
    btn2.classList.toggle ('cor');
    btn1.classList.remove ('some')
    btn1.classList.toggle ('some');
    btn3.classList.remove ('cor');
    btn4.classList.remove ('cor');
})

end.addEventListener ('change', () =>{
    btn3.classList.toggle ('cor');
    btn2.classList.remove ('cor');
    btn1.classList.remove ('some')
    btn1.classList.toggle ('some');
    btn4.classList.remove ('cor');
})

ped.addEventListener ('change', () =>{
    btn4.classList.toggle ('cor');
    btn2.classList.remove ('cor');
    btn1.classList.remove ('some');
    btn1.classList.toggle ('some');
    btn3.classList.remove ('cor');
})

function applyblur() {
    let header = document.getElementById('header')
    let corpo = document.getElementById('corpo')
    let foot = document.getElementById('footer')
    header.classList.toggle ('blur');
    corpo.classList.toggle ('blur');
    foot.classList.toggle ('blur');
    header.classList.toggle ('pointer');
    corpo.classList.toggle ('pointer');
    foot.classList.toggle ('pointer');
}
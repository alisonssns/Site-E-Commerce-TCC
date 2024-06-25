let b1 = document.getElementById ('descrição')
let b2 = document.getElementById ('especificações')
let button1 = document.getElementById('desc')
let button2 = document.getElementById('esp')

function muda1() {
    button1.classList.remove('no-color');
    button2.classList.remove('color');
};

function muda2() {
    button2.classList.toggle('color');
    button1.classList.toggle('no-color');
};

let boleto = document.getElementById ('bol_desc')
let pix = document.getElementById ('pix_desc')
let pix_btn = document.getElementById('pix')
let bol_btn = document.getElementById('boleto')

bol_btn.addEventListener ('change', () =>{
    boleto.classList.remove ('some');
    pix.classList.remove ('aparece');
})

pix_btn.addEventListener ('change', () =>{
    boleto.classList.toggle ('some');
    pix.classList.toggle ('aparece');
})

let currentTranslateX = 0;
const maxTranslateX = -2641;
const minTranslateX = 0;

document.addEventListener("DOMContentLoaded", function () {
    const avanca = document.querySelector(".avanca");
    const box = document.querySelector(".box_prods");
    avanca.addEventListener("click", function () {
    if (currentTranslateX > maxTranslateX) {
    currentTranslateX -= 1321;
    box.style.transform = `translateX(${currentTranslateX}px)`;
        }});
    });
    
document.addEventListener("DOMContentLoaded", function () {
    const volta = document.querySelector(".volta");
    const box = document.querySelector(".box_prods");
    volta.addEventListener("click", function () {
    if (currentTranslateX < minTranslateX) {
    currentTranslateX += 1321;
    box.style.transform = `translateX(${currentTranslateX}px)`;
        }});
    });

const btnPrev = document.querySelector("#Slide_Prev");
const btnNext = document.querySelector("#Slide_Next");
const carousel = document.querySelector(".Wrapper_Elements_Actu");
const container = document.querySelector(".Container_Carrousel_Actu");


const DivExemple = document.querySelector("#Actu1");
const LargeurDiv = DivExemple.offsetWidth;

const LargeurWrap = container.offsetWidth;
const LargeurEcran = window.innerWidth;

let compteur = 0;
let distance = 0;

btnNext.addEventListener("click", (e) =>{
    if(compteur<3){
        compteur++;
    }
    else{
        compteur=0;
    }
    console.log(LargeurWrap);
    distance = LargeurWrap/3 * compteur;
    console.log(distance);
    carousel.style.transform = 'translateX(' + -distance + 'px)';
});

btnPrev.addEventListener("click", (e) =>{
    if(compteur>0){
        compteur--;
    }
    else{
        compteur=3;
    }
    console.log(LargeurWrap);
    distance = LargeurWrap/3 * compteur;
    console.log(distance);
    carousel.style.transform = 'translateX(' + -distance + 'px)';
});


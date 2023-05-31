const fleche1 = document.getElementById("flecheD1");
const fleche2 = document.getElementById("flecheD2");
const fleche3 = document.getElementById("flecheD3");

const btn1 = document.getElementsByClassName("btn_decouvrir1")[0];
const btn2 = document.getElementsByClassName("btn_decouvrir2")[0];
const btn3 = document.getElementsByClassName("btn_decouvrir3")[0];

const liensActif = document.getElementsByClassName("Liens2");

document.addEventListener("onload", (e) =>{
    liensActif.style.color = "var(--bleu10)";
});

btn1.addEventListener("click", (e) => {
    fleche1.style.animation = "vibration 0.3s 1";
});

btn2.addEventListener("click", (e) => {
    fleche2.style.animation = "vibration 0.3s 1";
});

btn3.addEventListener("click", (e) => {
    fleche3.style.animation = "vibration 0.3s 1";
});


//**********  ANIMATION */

/* const Div_Sport = document.getElementById("Div_Sport_Compet");
const Div_Salle = document.getElementById("Div_salle_Sport");

const AnimSport = anime({
    targets: "#Div_Sport_Compet",
    opacity: 1,
    duration: 2000,
    autoplay: false,
});

const AnimSalle = anime({
    targets: "#Div_salle_Sport",
    opacity: 1,
    duration: 2000,
    autoplay: false,
});

window.onscroll = function (){
    let scrollPos = document.documentElement.scrollTop;
    let PosSport = Div_Sport.offsetTop;
    let PosSalle = Div_Salle.offsetTop;

    const scrollSport = scrollPos - PosSport;
    const scrollSalle = scrollPos - PosSalle;

    console.log("Offset : " + scrollPos);
    console.log("diffPos : " + PosSalle);
    console.log("scroll : " + scrollSalle);
    if(scrollSport<=-300){
        AnimSport.seek(((scrollSport + 1550) / 10000) * AnimSport.duration);
    }
    if(scrollSalle<-300){
        AnimSalle.seek(((scrollSalle + 1550) / 10000) * AnimSalle.duration);
    }
}
 */

let DessinLogo = anime({
    targets: 'svg path',
    strokeDashoffset: [anime.setDashoffset, 0],
    easing: 'easeInOutSine',
    duration: 5000,
    direction: 'alternate',
    delay: function(el, i) { return i * 250 },
    loop: true,
    complete: function(){
        header.style.opacity = "1";
        Anim.style.opacity = "0";
        body.style.overflow = "visible";
        btnOffres.style.opacity = "1"
        isAnime = true;
    }
});
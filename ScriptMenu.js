const btnPrev = document.querySelector("#Slide_Prev");
const btnNext = document.querySelector("#Slide_Next");
const carousel = document.querySelector(".Wrapper_Elements_Actu");
const container = document.querySelector(".Container_Carrousel_Actu");

const btnOffres = document.querySelector(".btn1");

const DivExemple = document.querySelector("#Actu1");
const LargeurDiv = DivExemple.offsetWidth;

const LargeurWrap = container.offsetWidth;
const LargeurEcran = window.innerWidth;

let compteur = 0;
let distance = 0;

let isAnime = false;

window.onload = function() {
    window.scrollTo(0, 0);  // Déplace la fenêtre de visualisation au sommet de la page
    //loadXMLDoc();
}

/* window.addEventListener('beforeunload', function(e) {
    modifyXML();
    loadXMLDoc();
});

function loadXMLDoc() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        //Request finished and response
        //is ready and status is OK
        if (this.readyState == 4 && this.status == 200) {
                studentDetails(this);
        } };
    xhttp.open("GET", "StockageAnim.xml", true);
    xhttp.send(); 
}

function modifyXML() {
    console.log("je pentre c'est deja pas mal");
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let xmlDoc = this.responseXML;
            let activationElement = xmlDoc.getElementsByTagName("Activation")[0];
            activationElement.textContent = "true"; // Mettez ici la nouvelle valeur que vous souhaitez assigner
            console.log("XML modifié : " + xmlDoc.documentElement.outerHTML);
            // Ici, vous pouvez envoyer le fichier XML modifié au serveur si nécessaire
        }
    };
    xhttp.open("GET", "StockageAnim.xml", true);
    xhttp.send();
}

function studentDetails(xml) {
    let xmlDoc = xml.responseXML;
    let x = xmlDoc.getElementsByTagName("bool");
    isAnime = x[0].getElementsByTagName("Activation")[0].childNodes[0].nodeValue;
    console.log("BOOL" + isAnime); 
} */

btnOffres.addEventListener("click", (e) =>{
    console.log("JE Penetre avant");
    const sectionCible = document.getElementById("section-cible");
    console.log("JE Penetre");
    if (sectionCible) {
        sectionCible.scrollIntoView({ 
            behavior: 'smooth' 
        });
        console.log("Dedans");
    }
});

//****************CAROUSEL

btnNext.addEventListener("click", (e) =>{
    if(compteur<3){
        compteur++;
    }
    else{
        compteur=0;
    }
    console.log(LargeurWrap);
    distance = LargeurWrap/3 * compteur - 5*compteur;
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
    distance = LargeurWrap/3 * compteur - 5*compteur;
    console.log(distance);
    carousel.style.transform = 'translateX(' + -distance + 'px)';
});

//************* ANIMATION OUVERTURE

const header = document.querySelector("header");
const Anim = document.getElementById("Animation_Debut");
const body = document.body;

if(isAnime==false){
    let DessinLogo = anime({
        targets: 'svg path',
        strokeDashoffset: [anime.setDashoffset, 0],
        easing: 'easeInOutSine',
        duration: 3000,
        delay: function(el, i) { return i * 250 },
        loop: false,
        complete: function(){
            header.style.opacity = "1";
            Anim.style.opacity = "0";
            body.style.overflow = "visible";
            btnOffres.style.opacity = "1"
            isAnime = true;
        }
    });
}

//************* ANIMATION SLIDE

const IMG_A_Propos = document.getElementById("PHOTO");
const Menu_A_Propos = document.getElementById("Div_Menu_A_Propos");

const Separation = document.getElementById("Separation");

const Abo1 = document.getElementsByClassName("Offres1");
const Abo2 = document.getElementsByClassName("Offres2");
const Abo3 = document.getElementsByClassName("Offres3");

const Menu_Actu = document.getElementById("Div_Menu_Actualite");

const animationSlidePhoto = anime({
    targets: "#PHOTO",
    opacity: 1,
    translateX: -700,
    duration: 4000,
    autoplay: false,
});

const animAbo1 = anime({
    targets: ".Offres1",
    opacity: 1,
    translateX: 700,
    duration: 4000,
    autoplay: false,
});

const animAbo2 = anime({
    targets: ".Offres2",
    opacity: 1,
    duration: 4000,
    autoplay: false,
});

const animAbo3 = anime({
    targets: ".Offres3",
    opacity: 1,
    translateX: -700,
    duration: 4000,
    autoplay: false,
});

const AnimActu = anime({
    targets: ".Container_Carrousel_Actu",
    opacity: 1,
    duration: 4000,
    autoplay: false,
});

const AnimbtnG = anime({
    targets: "#Slide_Prev",
    opacity: 1,
    translateX: 500,
    duration: 4000,
    autoplay: false,
});

const AnimbtnD = anime({
    targets: "#Slide_Next",
    opacity: 1,
    translateX: -500,
    duration: 4000,
    autoplay: false,
});


//animationSlide.direction = "reverse";

window.onscroll = function (){
    let scrollPos = document.documentElement.scrollTop;
    let PosElement = Menu_A_Propos.offsetTop;
    let PosOffres = Separation.offsetTop;
    let PosActu = Menu_Actu.offsetTop;

    const scrollPhoto = scrollPos - PosElement;
    const scrollOffres = scrollPos - PosOffres;
    const scrollActu = scrollPos - PosActu;

    if(scrollPhoto<0){
        animationSlidePhoto.seek(((scrollPhoto + 1250) / 10000) * animationSlidePhoto.duration);
    }
    if(scrollOffres<-170){
        animAbo1.seek(((scrollOffres + 1050) / 10000) * animAbo1.duration);
        animAbo2.seek(((scrollOffres + 1050) / 10000) * animAbo2.duration);
        animAbo3.seek(((scrollOffres + 1050) / 10000) * animAbo3.duration);
    }
    if(scrollActu<=0){
        AnimActu.seek(((scrollActu + 1250) / 10000) * AnimActu.duration);
    }
    if(scrollActu<=-200){
        AnimbtnG.seek(((scrollActu + 1500) / 10000) * AnimbtnG.duration);
        AnimbtnD.seek(((scrollActu + 1500) / 10000) * AnimActu.duration);
    }
}


const CarteSUP = document.querySelector("#Carte_Sup");      //Récuperation des éléments
const CarteMIL = document.querySelector("#Carte_Inf");
const CarteINF = document.querySelector("#Carte_Bas")
const Date_affi_mois = document.querySelector("#DATE_CARTE_M");
const Date_affi_annee = document.querySelector("#DATE_CARTE_Y");
const Nom_affi = document.querySelector("#NOM_CARTE");
const Num_affi = document.querySelector("#ID_CARTE");
const CVV_affi = document.querySelector("#Case_CVV");

const Inp_Num_Carte = document.querySelector("#Num_carte");
const Inp_Titu_Carte = document.querySelector("#Titulaire");
const Inp_Exp_Mois = document.querySelector("#InpMois");
const Inp_Exp_Annee = document.querySelector("#InpAnnee");
const InpType = document.querySelector("#InpType");
const logo = document.querySelector("#logo");
const Inp_CVV = document.querySelector("#CVV");
const form = document.getElementById('FormCB');
const sub_Btn = document.getElementById("sub_Btn");

Inp_Num_Carte.addEventListener("input", (e) =>{     //On mets des espaces automatiques tout les 4 chiffres et on supprime les lettres dans le code plus bas
    Num_affi.innerHTML = Inp_Num_Carte.value;

    let value = e.target.value;
    value = value.replace(/\s/g, "");
    value = value.replace(/(\d{4})/g, "$1 ");
    e.target.value = value;
})

Inp_Titu_Carte.addEventListener("input", (e) =>{    //On mets des Automatiquement en majuscule le titulaire et on annule les chiffres dans le code plus bas
    let nomRecup = Inp_Titu_Carte.value;
    nomRecup = nomRecup.toUpperCase();
    Nom_affi.innerHTML = nomRecup;
})

Inp_Exp_Mois.addEventListener("input", (e) =>{      //Recuperation de la date
    Date_affi_mois.innerHTML = Inp_Exp_Mois.value;
})

Inp_Exp_Annee.addEventListener("input", (e) =>{
    Date_affi_annee.innerHTML = Inp_Exp_Annee.value;
})

Inp_CVV.addEventListener("input", (e) =>{
    CVV_affi.innerHTML = Inp_CVV.value;
})

Inp_CVV.addEventListener("focus", (e) => {          //Changement de coté de la carte
    console.log("TEST FOCUS");
    const Dos_Carte = document.querySelector("#W_Carte");
    Dos_Carte.style.transform = "rotateY(180deg)";
})

Inp_CVV.addEventListener("blur", (e) => {           //Changement de coté de la carte
    console.log("TEST BLUR");
    const Dos_Carte = document.querySelector("#W_Carte");
    Dos_Carte.style.transform = "rotateY(0deg)";
})

Inp_Titu_Carte.addEventListener('input', function(e) {  
    var newValue = this.value.replace(/[^a-zA-Z\s]/g, '');
    if (this.value !== newValue) {
        this.value = newValue;
    }
});

Inp_Num_Carte.addEventListener('input', function(e) {
    var newValue = this.value.replace(/[^0-9\s]/g, '');
    if (this.value !== newValue) {
        this.value = newValue;
    }
});

Inp_CVV.addEventListener('input', function(e) {     //Blindage du CVV
    var newValue = this.value.replace(/[^0-9]/g, '');
    if (this.value !== newValue) {
        this.value = newValue;
    }
});


function VerifChampsMois() {
    let mois = Inp_Exp_Mois.value;
    
    if (mois !== 999) {
        sub_Btn.disabled = false;
    } else {
        sub_Btn.disabled = true;
    }
}

function VerifChampsDate() {
    let annee = Inp_Exp_Annee.value;
    
    if (annee !== 999) {
        sub_Btn.disabled = false; // Activer le bouton de soumission
    } else {
        sub_Btn.disabled = true; // Désactiver le bouton de soumission
    }
}

InpType.addEventListener("input", (e) =>{       //On change l'image du logo selon l'input
    console.log(logo);
    console.log(InpType.value);

    if(InpType.value==="01"){
        logo.src = "photos/logo visa.png";
    }
    else if(InpType.value==="02"){
        logo.src = "photos/logo_mastercard.png";
    }
    else if(InpType.value==="03"){
        logo.src = "photos/logo paypal.png";
    }
    else if(InpType.value==="04"){
        logo.src = "photos/Logo American Express.png";
    }
})
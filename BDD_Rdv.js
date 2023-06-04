const InpID = document.querySelector("#Inp_ID_Rdv");

let buttonPrev;
let compteur = 0;

document.addEventListener('click', (e) => {
    if (e.target.id === 'WrappBDD') {
        let valeurID = e.target.dataset.idrdv;      //Récupération des valeurs datas
        
        console.log(valeurID, typeof valeurID);     //Affichage des valeurs
        
        console.log(InpID, typeof InpID);
        InpID.value = valeurID;         //On injecte la data recupéré dans l'input
    }
});
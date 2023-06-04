const Inp_Row = document.querySelector("#Inp_Row");
const Inp_Col = document.querySelector("#Inp_Col");

let buttonPrev;
let compteur = 0;

document.addEventListener('click', (e) => {
if (e.target.id === 'cases') {      //Si on appuie sur une case, ...
    let valeurLigne = e.target.dataset.row;         //Recuperation de la colonne et de la ligne
    let valeurColonne = e.target.dataset.col;
    
    console.log(valeurLigne, typeof valeurLigne);
    console.log(valeurColonne, typeof valeurColonne);
    
    const button = document.querySelector(`#cases[data-row='${valeurLigne}'][data-col='${valeurColonne}']`);        //On récupère le bouton sur lequel on appuie
    console.log(button);
    
    const classe = button.className;        //On récupère sa classe
    console.log(classe);
    
    if (classe === "libre") {       //Si il est libre, ...

        if(compteur>0){
            buttonPrev.style.backgroundColor = "var(--bleu6)";      //Changement couleur pour btn selectionner
        }
        
        Inp_Row.value = valeurLigne;        //On injecte dans les inputs
        Inp_Col.value = valeurColonne;
        button.style.backgroundColor = "var(--bleu2)";      //Changement Couleur
        buttonPrev = button;
    }
        compteur++;
    }

});
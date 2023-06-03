const Inp_Row = document.querySelector("#Inp_Row");
const Inp_Col = document.querySelector("#Inp_Col");

let buttonPrev;
let compteur = 0;

document.addEventListener('click', (e) => {
if (e.target.id === 'cases') {
    let valeurLigne = e.target.dataset.row;
    let valeurColonne = e.target.dataset.col;
    
    console.log(valeurLigne, typeof valeurLigne);
    console.log(valeurColonne, typeof valeurColonne);
    
    const button = document.querySelector(`#cases[data-row='${valeurLigne}'][data-col='${valeurColonne}']`);
    console.log(button);
    
    const classe = button.className;
    console.log(classe);
    
    if (classe === "libre") {

        if(compteur>0){
            buttonPrev.style.backgroundColor = "var(--bleu6)";
        }
        
        Inp_Row.value = valeurLigne;
        Inp_Col.value = valeurColonne;
        button.style.backgroundColor = "var(--bleu2)";
        buttonPrev = button;
    }

        /* else{
            Inp_Row.classList.remove('animation-shake');
            Inp_Row.classList.add('animation-shake');
            Inp_Col.classList.remove('animation-shake');
            Inp_Col.classList.add('animation-shake');
        } */
        compteur++;
    }

});
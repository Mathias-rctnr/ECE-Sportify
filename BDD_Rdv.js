const InpID = document.querySelector("#Inp_ID_Rdv");

let buttonPrev;
let compteur = 0;

document.addEventListener('click', (e) => {
    if (e.target.id === 'WrappBDD') {
        let valeurID = e.target.dataset.idrdv;
        
        console.log(valeurID, typeof valeurID);
        
        console.log(InpID, typeof InpID);
        InpID.value = valeurID;
        /* const button = document.querySelector(`#cases[data-row='${valeurLigne}'][data-col='${valeurColonne}']`);
        console.log(button);
        
        const classe = button.className;
        console.log(classe); */
    }
    console.log("test");
});
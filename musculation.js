const cases = [...document.querySelectorAll("#cases button")];
const Inp_Row = document.querySelector("#Inp_Row");
const Inp_Col = document.querySelector("#Inp_Col");
const div = document.querySelector(".edt");

div.addEventListener('click', (e) => {
    let valeurLigne = e.target.dataset.row;
    let valeurColonne = e.target.dataset.col;

    console.log(valeurLigne, typeof valeurLigne);
    console.log(valeurColonne, typeof valeurColonne);


    if(typeof valeurColonne === "string"){
        Inp_Col.value = valeurColonne;
    }
    if(typeof valeurLigne === "string"){
        Inp_Row.value = valeurLigne;
    }

    console.log("nv-------------------");
});


function verif() {
    let input1 = document.getElementById("input1");
    let input2 = document.getElementById("input2");
    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let tel = document.getElementById("tel");
    let mail = document.getElementById("mail");
    let adress = document.getElementById("adress");
    let ville = document.getElementById("ville");
    let cp = document.getElementById("cp");
    let pays = document.getElementById("pays");
    let num_etu = document.getElementById("num_etu");
    let bouton = document.getElementById("val");
    let span = document.getElementById("message_pswrd");

    let pattel =  "/^[0-9]{10}$/";
    let patnumetu = "/^(?:\d{10}[a-zA-Z]$)|(?:\d{9}[a-zA-Z]{2})$/";
    let patcp =  "/^[0-9]{5}$/";
    let patmail = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";


    if (input1.value === input2.value) {
        // Les mots de passe sont identiques

        span.classList.remove("input-error");
    } else {
        // Les mots de passe ne sont pas identiques
        span.classList.add("input-error");
    }

if (
        input1.value !== "" &&
        input2.value !== "" &&
        nom.value !== "" &&
        prenom.value !== "" &&
        tel.value !== "" &&
        mail.value !== "" &&
        adress.value !== "" &&
        ville.value !== "" &&
        cp.value !== "" &&
        pays.value !== "" &&
        num_etu.value !== "" &&
        input1.value === input2.value) { 

        bouton.disabled = false;
        bouton.classList.remove("envoyer_red");
        bouton.classList.add("envoyer");
    }
    else if(input1.value !== "" &&
    input2.value !== "" &&
    nom.value !== "" &&
    prenom.value !== "" &&
    tel.value !== "" &&
    mail.value !== "" &&
    adress.value !== "" &&
    ville.value !== "" &&
    cp.value !== "" &&
    pays.value !== "" &&
    num_etu.value !== "" &&
    input1.value != input2.value){

        bouton.disabled = true;
    }
    else{

        bouton.classList.remove("envoyer");
        bouton.classList.add("envoyer_red");
    }

}

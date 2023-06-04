var afficher = "false";

function afficherboutons() {
    var optionsDiv = document.getElementById("info");

    var calque = document.getElementById("calque");

    if (afficher == "false") {
        optionsDiv.style.display = "block";
        calque.innerHTML = ".calque {height: 710vh;}";
        afficher = "true";
    }

    else {
        optionsDiv.style.display = "none";
        calque.innerHTML = ".calque {height: 150vh;}";
        afficher = "false";
    }
}


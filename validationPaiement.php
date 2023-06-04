<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Confirmation de Réservation</title>
        <link rel="stylesheet" href="confirmation.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <div class="Titre_Sportify">Sportify</div>
            <div class="Wrapper_Liens">
                <a class="Liens1" id="liens_Nav" href="menu.html">Accueil</a>
                <a class="Liens2" id="liens_Nav" href="Tout_parcourir.html">Tout Parcourir</a>
                <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
                <a class="Liens4" id="liens_Nav" href="Affichage_Rdv.php">Rendez-Vous</a>
                <a class="Liens5" id="liens_Nav" href="moncompte.php">Votre Compte</a>
            </div>
        </header>

        <div class="Wrapper">
            <div id="container">
                <div class="Icone_Validation">
                    <svg width="683" height="683" viewBox="0 0 683 683" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_6_2)">
                        <path class="monChemin" d="M310.667 1.33329C244.8 7.73329 184 32 130.667 73.0666C104.667 93.0666 70.9333 130.667 51.4666 161.333C43.0666 174.533 26.6666 208.133 20.8 224.133C14.2666 242 7.19997 269.467 3.7333 290.667C-0.400033 316.667 -0.400033 366 3.7333 392C9.7333 428.8 19.2 458.4 35.3333 491.333C52.9333 527.2 71.2 552.667 100.533 582.133C130 611.467 155.467 629.733 191.333 647.333C224.267 663.467 253.867 672.933 290.667 678.933C316.667 683.067 366 683.067 392 678.933C428.8 672.933 458.4 663.467 491.333 647.333C527.2 629.733 552.667 611.467 582.133 582.133C611.467 552.667 629.733 527.2 647.333 491.333C659.067 467.467 664.933 451.867 671.333 427.867C679.733 395.867 681.733 378.4 681.733 341.333C681.733 304.267 679.733 286.8 671.333 254.8C664.933 230.8 659.067 215.2 647.333 191.333C629.733 155.467 611.467 130 582.133 100.533C552.667 71.2 527.2 52.9333 491.333 35.3333C458.533 19.2 428.133 9.59996 392.667 3.99996C373.067 0.93329 329.333 -0.533377 310.667 1.33329ZM378.667 51.2C511.067 69.0666 613.6 171.6 631.467 304C635.333 333.2 633.333 375.467 626.8 404.933C599.867 524.8 501.2 614.933 378.667 631.467C360.667 633.867 322 633.867 304 631.467C171.6 613.6 69.0666 511.067 51.2 378.667C48.8 360.667 48.8 322 51.2 304C68.9333 172.133 171.067 69.6 302.667 51.3333C319.867 48.9333 361.2 48.9333 378.667 51.2Z" fill="black"/>
                        <path class="monChemin" d="M498.133 196.533C494 198.133 467.6 223.733 377.733 313.6L262.667 428.667L227.067 393.067C207.333 373.6 189.467 356.667 187.067 355.467C181.867 352.8 170.4 352.667 165.6 355.2C153.467 361.467 148.533 376.133 154.533 387.733C158.4 395.067 247.467 483.467 253.6 486C259.467 488.4 262.8 488.533 270 486.533C274.667 485.333 292.267 468.133 400.4 360.267C484.933 275.867 526.267 233.6 528 229.867C537.6 210.4 518.4 189.067 498.133 196.533Z" fill="black"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_6_2">
                        <rect width="682.667" height="682.667" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="Txt_Validation">
                    <p class="txt_Valid">Merci d'avoir choisi notre salle de sport ! Nous sommes ravis de vous accueillir parmi nos nouveaux membres.</p>
                    <div class="Wrapper_btn">
                            <button value="2" id="btn_reserv" onclick="window.location.href='menu.html'"><div class="txt_btn5"><p>Accueil<i class="fa fa-arrow-right"></i></p></div></button>
                    </div>
                </div>
            </div>
        </div>
        <script src="confirmation.js"></script>
    </body>
</html>

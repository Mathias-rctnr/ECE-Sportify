<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rendez-vous</title>
        <link rel="stylesheet" href="Affichage_Rdv.css">
    </head>
    <body>
        <header>
            <div class="Titre_Sportify">Sportify</div>
            <div class="Wrapper_Liens">
                <a class="Liens1" id="liens_Nav" href="menu.html">Accueil</a>
                <a class="Liens2" id="liens_Nav" href="Tout_parcourir.html">Tout Parcourir</a>
                <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
                <a class="Liens4" id="liens_Nav" href="">Rendez-Vous</a>
                <a class="Liens5" id="liens_Nav" href="">Votre Compte</a>
            </div>
        </header>

        <div class="Wrapper">
            <div class="ContainerResult">
                <div class="Titre">
                    <h1>Vos rendez-vous</h1>
                </div>
                <div class="Resultats">
                    <?php include("BDD_Rdv.php"); ?>
                </div>
            </div>
        </div>
    </body>
</html>
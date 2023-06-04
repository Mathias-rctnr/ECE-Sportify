<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sportify</title>
    <link rel="stylesheet" href="musculation.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

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

    <div class="Content">
        <div id="debut">
            <img class="Back" src="photos/sport de competition/rugbytete.png" alt="background_Gym">
        </div>
        <div id="coach">
            <a href="cvrugby.html">
                <div class="cv_cache">
                    <img class="cv_coach" src="photos/activites sportives/cv.png" alt="cliquez pour voir cv">
                    <img class="photo_coach" src="photos/sport de competition/rugby.png" alt="coach rugby">
            </a>
        </div>
        <div class="text_coach">
            <p class="nom_coach">
                <span class="highlight">AARON THOMAS<br><br> A10</span><br>
                <span class="bureau">SPORTIFY ST-TROPEZ - 99 Rue du General Allard, 83990 Saint-Tropez France</span>
            </p>

            <p class="description_coach">
                Préparez-vous à vivre <span class="highlight">une expérience inoubliable</span> dans le monde du rugby avec un coach passionné qui vous
                emmènera vers de nouveaux sommets.C Ce coach de rugby possède une connaissance approfondie du jeu, une
                énergie contagieuse et un véritable dévouement pour vous aider à atteindre vos objectifs.<br><br> Avec lui, vous
                découvrirez les fondamentaux du rugby, les techniques de plaquage, les passes précises et les stratégies
                de jeu gagnantes. Son <span class="highlight">approche pédagogique personnalisée</span> vous permettra de développer vos compétences
                techniques, d'améliorer votre condition physique et de renforcer votre esprit d'équipe.<br><br>
                Son enthousiasme et son soutien constant <span class="highlight">feront de vous un joueur plus fort, plus compétent et plus
                passionné</span>. Rejoignez ses cours de rugby et préparez-vous à vivre des moments intenses, à forger des
                liens solides avec vos coéquipiers et à créer des souvenirs durables.
        </div>
    </div>
    <div id="dispo">
        <div class="rdv_text">
            <p>MES DISPONIBILITÉS</p>
        </div>
        <div id="rdv">
            <div class="container_edt">

                <div class="edt">
                <?php
                    session_start();        //VOIR COMMENTAIRES BASKET.PHP

                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $compteur = 0;

                    $_SESSION['id_Coach'] = "A10";
                    $_SESSION['specialite'] = 'rugby';

                    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
                    $db_handle = mysqli_connect("localhost", "root", "");
                    $db_found = mysqli_select_db($db_handle, $database);

                    $Bouton = isset($_POST["btn"]) ? $_POST["btn"] : "";

                    $date = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $heure = array(9, 9, 10, 11, 12, 14, 14, 15, 16, 17, 17);
                    $minutes = array(00, 45, 30, 15, 00, 00, 45, 30, 15, 00, 45);
                    $Reserv = "reserv";

                    if($db_found){
                            echo "<table>";

                            echo "<tr>";
                            for($i=0; $i<6 ;$i++){
                                echo "<th><p>" . $date[$i] . "</p></th>";
                            }
                            echo "</tr>";
                            for($row=0; $row<11; $row++){
                                echo "<tr>";

                                $dbl_zero = "";
                                if($minutes[$row] === 0){
                                    $dbl_zero = "0";
                                }

                                for ($col = 0; $col < 6; $col++) {
                                    $tempDate = $date[$col];
                                    $tempHeure = $heure[$row];
                                    $tempMinute = $minutes[$row];
                                    $tempSpe = 'rugby';
                                    $requete = "SELECT * FROM rdv WHERE date = '$tempDate' AND heure_rdv = '$tempHeure' AND minutes_rdv = '$tempMinute' AND specialite = '$tempSpe'";
                                    $result = mysqli_query($db_handle, $requete);

                                    if (mysqli_num_rows($result) === 0) {
                                        $Reserv = "libre";
                                    } else {
                                        $Reserv = "reserv";
                                    }

                                    $compteur++;

                                    echo "<td><button class='" . $Reserv . "' name='". $compteur ."' id='cases' data-row='" . $row ."' data-col='" . $col ."'>" . $heure[$row] .":". $minutes[$row] . $dbl_zero ."</button></td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";

                            $_SESSION['specialite'] = $tempSpe;
                    }
                    ?>
                </div>
            </div>
        </div>

        <form action="confirmation.php" method="post">
                <div id="Input_cases">
                    <p>Colonne: </p>
                    <input id="Inp_Col" name="Num_Col" required>
                    <p>Ligne:</p>
                    <input id="Inp_Row" name="Num_Lig" required>
                </div>
            </div>
        <div class = "button">
        <div class="card">
            <button type="submit" class="card">
                <p class="title">VALIDER</p>
            </button>
        </div>

        <div class="card">
            <div class="card-info">
                <p class="title">ME CONTACTER</p>
            </div>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>

    <script src="musculation.js"></script>
</body>

</html>